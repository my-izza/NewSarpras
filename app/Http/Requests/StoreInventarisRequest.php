<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreInventarisRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'barcode' => 'required|string|unique:inventaris',
            'no_inventaris' => 'required|string|unique:inventaris',
            'room_id' => 'required|exists:rooms,id',
            'item_id' => 'required|exists:items,id',
            'kategori_barang' => 'required|in:Elektronik,Meubeler,Umum',
            'kategori_ruang' => 'required|in:Kantor,Kelas,Fasilitas Umum',
            'merk' => 'required|string',
            'type' => 'required|string',
            'harga' => 'required|numeric',
            'tgl_peroleh' => 'required|date',
            'jumlah_barang' => 'required|integer',
            'total_harga' => 'required|numeric',
        ];
    }
}
