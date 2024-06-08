<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_ruang',
        'gedung',
        'nama_ruang',
        'kategori',
        'luas',
        'foto_depan',
        'foto_ruang',
        'kapasitas_ruang',
        'deskripsi'
    ];

    protected $table = 'rooms';

    public function room_histories()
    {
        return $this->hasMany(RoomHistories::class, 'room_id', 'no_ruang');
    }

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (!in_array($model->kategori, ['Kantor', 'Kelas', 'Fasilitas Umum'])) {
                throw new \InvalidArgumentException('Invalid category value');
            }
        });
    }
}
