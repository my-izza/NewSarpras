<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = [
        'barcode',
        'no_inventaris',
        'room_id',
        'item_id',
        'kategori',
        'harga',
        'aset',
        'tgl_peroleh',
        'jumlah_barang',
        'total_harga',
        'deskripsi',
        'foto'
    ];

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }
}
