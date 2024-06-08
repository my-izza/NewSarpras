<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\RoomHistories;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class RoomHistoriesController extends Controller
{
    public function viewRoomHistories(): View
    {
        // Ambil data room dengan relasi history
        $roomHistory = RoomHistories::orderBy('updated_at', 'desc')->get();

        return view('roomhistories.viewRoomHistories', compact('roomHistory'));
    }

    //Method tambah RoomHistories
    public function createRoomHistory(): View
    {
        //Mengambil RoomHistories
        $roomHistory = RoomHistories::get();
        //Mengambil RoomHistories
        $room = Room::get();
        //Menampilkan RoomHistories
        return view('roomhistories.createRoomHistory', compact('roomHistory', 'room'));
    }

    public function storeRoomHistory(Request $request)
    {
        //Melakukan Validasi Inputan
        $validator = Validator::make($request->all(), [
            'no_ruang'          => 'required|exists:rooms,no_ruang',
            'tgl_pembangunan'   => 'nullable|date',
            'tgl_peresmian'     => 'nullable|date',
            'tgl_renovasi'      => 'nullable|date',
            'tgl_perobohan'     => 'nullable|date',
            'biaya_pembangunan' => 'nullable',
            'harga_penjualan'   => 'nullable|numeric',
            'deskripsi'         => 'nullable'
        ]);

        //Jika Error Kembali Membawa Nilai dan Pesan Error
        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        // Get room_id from the selected no_ruang
        $room_id = Room::where('no_ruang', $request->no_ruang)->value('id');

        //Menyimpan Data
        $roomHistory = new RoomHistories();
        $roomHistory->room_id             = $room_id;
        $roomHistory->no_ruang            = $request->no_ruang;
        $roomHistory->tgl_pembangunan     = $request->tgl_pembangunan;
        $roomHistory->tgl_peresmian       = $request->tgl_peresmian ?? null;
        $roomHistory->tgl_renovasi        = $request->tgl_renovasi ?? null;
        $roomHistory->tgl_perobohan       = $request->tgl_perobohan ?? null;
        $roomHistory->biaya_pembangunan   = $request->biaya_pembangunan ?? null;
        $roomHistory->harga_penjualan     = $request->harga_penjualan ?? null;
        $roomHistory->deskripsi           = $request->deskripsi;
        $roomHistory->save();

        //Data RoomHistories Berhasil Ditambahkan
        Session::flash('success', 'Data berhasil ditambahkan.');

        //Kembali ke view-RoomHistorys
        return redirect()->route('view-room-histories');
    }

    public function editRoomHistory(Request $request, $id)
    {
        // Ambil data room dengan relasi history
        $roomHistory = RoomHistories::findOrFail($id);

        $room = Room::get();

        $selectedRoomId = $roomHistory->room_id;

        return view('roomhistories.editRoomHistory', compact('roomHistory', 'room', 'selectedRoomId'));
    }

    public function updateRoomHistory(Request $request, $id)
    {
        //Melakukan Validasi Inputan
        $validator = validator::make($request->all(), [
            'room_id' => 'required|exists:rooms,id',
            'no_ruang' => 'required|exists:rooms,no_ruang',
            'tgl_pembangunan'   => 'nullable|date',
            'tgl_peresmian'      => 'nullable|date',
            'tgl_renovasi'          => 'nullable|date',
            'tgl_perobohan'          => 'nullable|date',
            'biaya_pembangunan'          => 'nullable',
            'harga_penjualan'         => 'nullable|numeric',
            'deskripsi'         => 'nullable'
        ]);

        //Jika Error Kembali Membawa Nilai dan Pesan Error
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        //Mencari Berdasarkan ID
        $roomHistory = RoomHistories::findOrFail($id);

        //Update Data
        $roomHistory['room_id']    = $request->room_id;
        $roomHistory['no_ruang']    = $request->no_ruang;
        $roomHistory['tgl_pembangunan']  = $request->tgl_pembangunan;
        $roomHistory['tgl_peresmian']     = $request->tgl_peresmian;
        $roomHistory['tgl_renovasi']         = $request->tgl_renovasi;
        $roomHistory['tgl_perobohan']         = $request->tgl_perobohan;
        $roomHistory['biaya_pembangunan']         = $request->biaya_pembangunan;
        $roomHistory['harga_penjualan']        = $request->harga_penjualan;
        $roomHistory['harga_penjualan']        = $request->harga_penjualan;
        $roomHistory['deskripsi']        = $request->deskripsi;

        $roomHistory->save();

        //Berhasil
        session()->flash('success', 'Data berhasil diubah.');

        //Kembali ke view-RoomHistorys
        return redirect()->route('view-room-histories')->with(['succes' => 'Data Berhasil Diubah!']);
    }

    //Menghapus Data
    public function destroyRoomHistory($id): RedirectResponse
    {
        //Ambil Data RoomHistories berdasarkan ID
        $roomHistory = RoomHistories::findOrFail($id);

        //Hapus Data RoomHistories
        $roomHistory->delete();

        //Berhasil
        session()->flash('success', 'Data berhasil dihapus.');

        //Kembali ke view-RoomHistorys
        return redirect()->route('view-room-histories')->with(['success' => 'Data Berhasil Dihapus!']);;
    }

    public function viewByPembangunan()
    {
        $roomHistory = RoomHistories::whereNotNull('tgl_pembangunan')->get();

        return view('roomhistories.viewHistoriPembangunan', compact('roomHistory'));
    }
}
