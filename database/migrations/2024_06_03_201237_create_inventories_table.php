<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->string('barcode')->unique();
            $table->string('no_inventaris')->unique();
            $table->foreignId('room_id')->constrained('rooms');
            $table->foreignId('item_id')->constrained('items');
            $table->enum('kategori', ['Elektronik', 'Meubeler', 'Umum'])->nullable();
            $table->decimal('harga', 15, 2);
            $table->enum('aset', ['Terhitung', 'Tidak Terhitung'])->nullable();
            $table->date('tgl_peroleh');
            $table->integer('jumlah_barang');
            $table->decimal('total_harga', 15, 2);
            $table->text('deskripsi')->nullable();
            $table->string('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventories');
    }
};
