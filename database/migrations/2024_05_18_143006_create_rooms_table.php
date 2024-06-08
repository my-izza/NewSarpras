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
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->integer('no_ruang')->unique();
            $table->string('gedung');
            $table->string('nama_ruang');
            $table->enum('kategori', ['Kantor', 'Kelas', 'Fasilitas Umum'])->nullable();
            $table->string('luas');
            $table->string('foto_depan');
            $table->string('foto_ruang');
            $table->string('kapasitas_ruang');
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};
