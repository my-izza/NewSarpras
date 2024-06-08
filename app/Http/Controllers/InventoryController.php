<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventory;
use App\Models\Room;
use App\Models\Item;
use Illuminate\Contracts\View\View;
use Picqer\Barcode\BarcodeGeneratorPNG;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log; // Import Log

class InventoryController extends Controller
{

    // Function viewInventories
    public function viewInventories(): View
    {
        // Mengurutkan berdasarkan data terbaru yang diubah
        $inventory = Inventory::orderBy('updated_at', 'desc')->get();
        //data item
        $item = Item::get();
        // Menampilkan Inventories
        return view('inventories.viewInventories', compact('inventory', 'item'));
    }

    //Method tambah Inventaris
    public function createInventory(): View
    {
        //Mengambil Inventaris
        $inventory = Inventory::get();
        //Mengambil Room
        $room = Room::get();
        //Mengambil Item
        $item = Item::get();

        //Menampilkan Inventaris
        return view('inventories.createInventory', compact('inventory', 'room', 'item'));
    }

    //menangkap data
    public function storeInventory(Request $request)
    {
        // Melakukan Validasi Inputan
        $validator = Validator::make($request->all(), [
            'no_inventaris' => 'required',
            'room_id' => 'required|exists:rooms,id',
            'item_id' => 'required|exists:items,id',
            'kategori'  => 'required|in:Elektronik,Meubeler,Umum',
            'harga'      => 'required|numeric',
            'aset'  => 'required|in:Terhitung,Tidak Terhitung',
            'tgl_peroleh' => 'required|date',
            'jumlah_barang' => 'nullable|integer',
            'total_harga' => 'nullable|numeric',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        // Generate barcode value (misal: kombinasi no_inventaris dan kategori)
        $barcodeValue = $validated['no_inventaris'] . '-' . $validated['kategori'];

        // Generate barcode
        $generator = new BarcodeGeneratorPNG();
        $barcodeData = $generator->getBarcode($barcodeValue, $generator::TYPE_CODE_128);

        // Create image from barcode data
        $barcodeImage = imagecreatefromstring($barcodeData);

        // Allocate colors and define text
        $white = imagecolorallocate($barcodeImage, 255, 255, 255);
        $black = imagecolorallocate($barcodeImage, 0, 0, 0);
        $text = $validated['no_inventaris'] . ' - ' . $validated['kategori'];

        // Define font size and calculate text position
        $font = 5; // Built-in font size
        $textWidth = imagefontwidth($font) * strlen($text);
        $textHeight = imagefontheight($font);
        $imageWidth = imagesx($barcodeImage);
        $imageHeight = imagesy($barcodeImage);
        $textX = ($imageWidth - $textWidth) / 2;
        $textY = $imageHeight - $textHeight - 5; // 5 pixels from bottom

        // Create new image with space for text
        $finalImage = imagecreatetruecolor($imageWidth, $imageHeight + $textHeight + 5);
        imagefilledrectangle($finalImage, 0, 0, $imageWidth, $imageHeight + $textHeight + 5, $white);
        imagecopy($finalImage, $barcodeImage, 0, 0, 0, 0, $imageWidth, $imageHeight);
        imagestring($finalImage, $font, $textX, $imageHeight + 5, $text, $black);

        // Save final image
        $barcodePath = 'barcodes/' . $barcodeValue . '.png';
        ob_start();
        imagepng($finalImage);
        $imageData = ob_get_clean();
        Storage::disk('public')->put($barcodePath, $imageData);

        // Clean up
        imagedestroy($barcodeImage);
        imagedestroy($finalImage);

        // Foto Item
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            //Memberikan Nama foto
            $fileitem = date('Y-m-d') . '-' . $foto->getClientOriginalName();
            //Lokasi Penyimpanan foto
            $fotoPath = 'inventories/' . $fileitem;
            // Simpan File
            Storage::disk('public')->put($fotoPath, file_get_contents($foto));
        }

        // Simpan data ke database
        $inventory = new Inventory();
        $inventory->no_inventaris = $validated['no_inventaris'];
        $inventory->room_id = $validated['room_id'];
        $inventory->item_id = $validated['item_id'];
        $inventory->kategori = $validated['kategori'];
        $inventory->harga = $validated['harga'];
        $inventory->aset = $validated['aset'];
        $inventory->tgl_peroleh = $validated['tgl_peroleh'];
        $inventory->jumlah_barang = $validated['jumlah_barang'];
        $inventory->total_harga = $validated['total_harga'];
        $inventory->deskripsi = $validated['deskripsi'];
        $inventory->barcode = $barcodePath; // simpan path barcode

        if (isset($fotoPath)) {
            $inventory->foto = $fotoPath;
        }

        $inventory->save();

        //Data Item Berhasil Ditambahkan
        session()->flash('success', 'Data berhasil ditambahkan.');

        //Kembali ke view-inventories
        return redirect()->route('view-inventories')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    // edit
    public function editInventory(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);
        $room = Room::all();
        $item = Item::all();

        // Memilih Berdasarkan Field Kategori
        $kategori = DB::select("SHOW COLUMNS FROM inventories WHERE Field = 'kategori'")[0]->Type;
        preg_match('/^enum\((.*)\)$/', $kategori, $matches);

        // Membuat Nilai Enum
        $enumValues = [];
        foreach (explode(',', $matches[1]) as $value) {
            $enumValues[] = trim($value, "'");
        }

        // Memilih Berdasarkan Field Aset
        $aset = DB::select("SHOW COLUMNS FROM inventories WHERE Field = 'aset'")[0]->Type;
        preg_match('/^enum\((.*)\)$/', $aset, $matches);

        // Membuat Nilai Enum
        $enumValuesAset = [];
        foreach (explode(',', $matches[1]) as $aset) {
            $enumValuesAset[] = trim($aset, "'");
        }

        $selectedRoomId = $inventory->room_id;
        $selectedItemId = $inventory->item_id;

        return view('inventories.editInventory', compact('inventory', 'room', 'item', 'selectedRoomId', 'selectedItemId', 'enumValues', 'enumValuesAset'));
    }

    // Method untuk menyimpan perubahan
    public function updateInventory(Request $request, $id)
    {
        $inventory = Inventory::findOrFail($id);

        // Melakukan Validasi Inputan
        $validator = Validator::make($request->all(), [
            'no_inventaris' => 'required',
            'room_id' => 'required|exists:rooms,id',
            'item_id' => 'required|exists:items,id',
            'kategori'  => 'required|in:Elektronik,Meubeler,Umum',
            'harga'      => 'required|numeric',
            'aset'  => 'required|in:Terhitung,Tidak Terhitung',
            'tgl_peroleh' => 'required|date',
            'jumlah_barang' => 'nullable|integer',
            'total_harga' => 'nullable|numeric',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validated = $validator->validated();

        // Generate barcode value (misal: kombinasi no_inventaris dan kategori)
        $barcodeValue = $validated['no_inventaris'] . '-' . $validated['kategori'];

        // Generate barcode
        $generator = new BarcodeGeneratorPNG();
        $barcodeData = $generator->getBarcode($barcodeValue, $generator::TYPE_CODE_128);

        // Create image from barcode data
        $barcodeImage = imagecreatefromstring($barcodeData);

        // Allocate colors and define text
        $white = imagecolorallocate($barcodeImage, 255, 255, 255);
        $black = imagecolorallocate($barcodeImage, 0, 0, 0);
        $text = $validated['no_inventaris'] . ' - ' . $validated['kategori'];

        // Define font size and calculate text position
        $font = 5; // Built-in font size
        $textWidth = imagefontwidth($font) * strlen($text);
        $textHeight = imagefontheight($font);
        $imageWidth = imagesx($barcodeImage);
        $imageHeight = imagesy($barcodeImage);
        $textX = ($imageWidth - $textWidth) / 2;
        $textY = $imageHeight - $textHeight - 5; // 5 pixels from bottom

        // Create new image with space for text
        $finalImage = imagecreatetruecolor($imageWidth, $imageHeight + $textHeight + 5);
        imagefilledrectangle($finalImage, 0, 0, $imageWidth, $imageHeight + $textHeight + 5, $white);
        imagecopy($finalImage, $barcodeImage, 0, 0, 0, 0, $imageWidth, $imageHeight);
        imagestring($finalImage, $font, $textX, $imageHeight + 5, $text, $black);

        // Save final image
        $barcodePath = 'barcodes/' . $barcodeValue . '.png';
        ob_start();
        imagepng($finalImage);
        $imageData = ob_get_clean();
        Storage::disk('public')->put($barcodePath, $imageData);

        // Clean up
        imagedestroy($barcodeImage);
        imagedestroy($finalImage);

        // Update Foto
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($inventory->foto) {
                Storage::disk('public')->delete($inventory->foto);
            }

            // Upload foto baru
            $foto = $request->file('foto');
            $fileitem = date('Y-m-d') . '-' . $foto->getClientOriginalName();
            $path = 'inventories/' . $fileitem;
            Storage::disk('public')->put($path, file_get_contents($foto));
            $inventory->foto = $path;
        }

        // Simpan data ke database
        $inventory->no_inventaris = $validated['no_inventaris'];
        $inventory->room_id = $validated['room_id'];
        $inventory->item_id = $validated['item_id'];
        $inventory->kategori = $validated['kategori'];
        $inventory->harga = $validated['harga'];
        $inventory->aset = $validated['aset'];
        $inventory->tgl_peroleh = $validated['tgl_peroleh'];
        $inventory->jumlah_barang = $validated['jumlah_barang'];
        $inventory->total_harga = $validated['total_harga'];
        $inventory->deskripsi = $validated['deskripsi'];
        $inventory->barcode = $barcodePath; // simpan path barcode

        $inventory->save();

        // Data Item Berhasil Diperbarui
        session()->flash('success', 'Data berhasil diperbarui.');

        // Kembali ke view-inventories
        return redirect()->route('view-inventories')->with(['success' => 'Data Berhasil Diperbarui!']);
    }

    //hapus
    public function destroyInventory($id): RedirectResponse
    {
        // Ambil Data inventory berdasarkan ID
        $inventory = Inventory::findOrFail($id);

        // Hapus File Foto jika ada
        if ($inventory->foto) {
            Storage::disk('public')->delete($inventory->foto);
        }

        // Hapus Data inventory
        $inventory->delete();

        // Berhasil
        session()->flash('success', 'Data berhasil dihapus.');

        // Kembali ke view-inventories
        return redirect()->route('view-inventories')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    //Function getItem
    public function getItem($id)
    {
        $item = Item::find($id);
        return response()->json($item);
    }
}
