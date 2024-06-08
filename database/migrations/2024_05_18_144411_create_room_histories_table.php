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
        Schema::create('room_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('room_id');
            $table->foreign('room_id')->references('id')->on('rooms')->onDelete('cascade');
            $table->integer('no_ruang'); // Pastikan tipe data sama dengan tabel rooms
            $table->foreign('no_ruang')->references('no_ruang')->on('rooms')->onDelete('cascade');
            $table->date('tgl_pembangunan')->nullable();
            $table->date('tgl_peresmian')->nullable();
            $table->date('tgl_renovasi')->nullable();
            $table->date('tgl_perobohan')->nullable();
            $table->decimal('biaya_pembangunan', 15, 2)->nullable();
            $table->decimal('harga_penjualan', 15, 2)->nullable();
            $table->string('deskripsi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('room_histories');
    }
};
