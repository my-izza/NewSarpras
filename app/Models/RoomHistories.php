<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomHistories extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'no_ruang',
        'tgl_pembangunan',
        'tgl_peresmian',
        'tgl_renovasi',
        'tgl_perobohan',
        'biaya_pembangunan',
        'harga_penjualan',
        'deskripsi',
    ];

    protected $table = 'room_histories';

    //Relasi dengan room
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id', 'no_ruang');
    }
}
