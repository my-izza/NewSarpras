<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    //Menampilkan Data Item
    public function viewitems(): View
    {
        //Tampil berdasar urut Nama Barang
        $item = Item::orderBy('nama_barang', 'ASC')->paginate();

        //Menampilkan Item
        return view('items.viewitems', compact('item'));
    }

    //Method tambah Item
    public function createItem(): View
    {
        //Mengambil Item
        $item = Item::get();
        //Menampilkan Item
        return view('items.createItem', compact('item'));
    }

    //Menangkap Data
    public function storeItem(Request $request)
    {
        //Melakukan Validasi Inputan
        $validator = Validator::make($request->all(), [
            'nama_barang'   => 'required',
            'gambar'        => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'kategori'      => 'required|in:Elektronik,Meubeler,Umum',
            'merk'          => 'required',
            'type'          => 'required',
            'harga'         => 'required|numeric',
            'deskripsi'     => 'nullable'
        ]);

        //Jika Error Kembali Membawa Nilai dan Pesan Error
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        //Foto Item
        $gambar = $request->file('gambar');
        //Memberikan Nama Gambar
        $fileitem = date('Y-m-d') . $gambar->getClientOriginalName();
        //Lokasi Penyimpanan Gambar
        $path = 'items/' . $fileitem;
        // Simpan File
        Storage::disk('public')->put($path, file_get_contents($gambar));

        //Menyimpan Data
        $item['nama_barang']  = $request->nama_barang;
        $item['gambar']       = $fileitem;
        $item['kategori']     = $request->kategori;
        $item['merk']         = $request->merk;
        $item['type']         = $request->type;
        $item['harga']        = $request->harga;
        $item['deskripsi']    = $request->deskripsi;

        //Membuat Item baru
        Item::create($item);

        //Data Item Berhasil Ditambahkan
        session()->flash('success', 'Data berhasil ditambahkan.');

        //Kembali ke view-items
        return redirect()->route('view-items')->with(['succes' => 'Data Berhasil Disimpan!']);
    }

    public function editItem(Request $request, $id)
    {
        //Mencari Berdasarkan ID
        $item = Item::findOrFail($id);
        //Memilih Berdasarkan Field Kategori
        $kategori = DB::select("SHOW COLUMNS FROM items WHERE Field = 'kategori'")[0]->Type;
        preg_match('/^enum\((.*)\)$/', $kategori, $matches);
        //Membuat Nilai Enum
        $enumValues = [];
        foreach (explode(',', $matches[1]) as $value) {
            $enumValues[] = trim($value, "'");
        }

        //Mengarah Pada edit-Item
        return view('items.editItem', compact('item', 'enumValues'));
    }

    public function updateItem(Request $request, $id)
    {
        //Melakukan Validasi Inputan
        $validator = validator::make($request->all(), [
            'nama_barang'   => 'required',
            'gambar'        => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'kategori'      => 'required|in:Elektronik,Meubeler,Umum',
            'merk'          => 'required',
            'type'          => 'required',
            'harga'         => 'required|numeric',
            'deskripsi'     => 'nullable'
        ]);

        //Jika Error Kembali Membawa Nilai dan Pesan Error
        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        //Mencari Berdasarkan ID
        $item = Item::findOrFail($id);

        //Update Foto Depan
        $gambar = $request->file('gambar');
        // Inisialisasi variabel $fileitem di luar kondisi if
        $fileitem = null;
        //Periksa File Sebelumnya
        if ($gambar) {
            $fileitem = date('Y-m-d') . $gambar->getClientOriginalName();
            $path = 'items/' . $fileitem;

            //Hapus File Sebelumnya
            if ($item->gambar) {
                Storage::disk('public')->delete('items/' . $item->gambar);
            }

            //Simpan File Baru
            Storage::disk('public')->put($path, file_get_contents($gambar));

            $item['gambar'] = $fileitem;
        }

        //Update Data
        $item['nama_barang']  = $request->nama_barang;
        $item['kategori']     = $request->kategori;
        $item['merk']         = $request->merk;
        $item['type']         = $request->type;
        $item['harga']        = $request->harga;
        $item['deskripsi']    = $request->deskripsi;

        $item->save();

        //Berhasil
        session()->flash('success', 'Data berhasil diubah.');

        //Kembali ke view-items
        return redirect()->route('view-items')->with(['succes' => 'Data Berhasil Diubah!']);
    }

    //Menghapus Data
    public function destroyItem($id): RedirectResponse
    {
        //Ambil Data Item berdasarkan ID
        $item = Item::findOrFail($id);

        //Hapus File Gambar
        Storage::disk('public')->delete('items/' . $item->gambar);

        //Hapus Data Item
        $item->delete();

        //Berhasil
        session()->flash('success', 'Data berhasil dihapus.');

        //Kembali ke view-items
        return redirect()->route('view-items')->with(['success' => 'Data Berhasil Dihapus!']);;
    }

    //Function getItem
    public function getItem($id)
    {
        $item = Item::find($id);
        return response()->json($item);
    }
}
