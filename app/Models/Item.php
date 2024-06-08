<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'gambar',
        'kategori',
        'merk',
        'type',
        'harga',
        'deskripsi'
    ];

    protected $table = 'items';

    public function inventory()
    {
        return $this->hasMany(Inventory::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            if (!in_array($model->kategori, ['Elektronik', 'Meubeler', 'Umum'])) {
                throw new \InvalidArgumentException('Invalid category value');
            }
        });
    }
}
