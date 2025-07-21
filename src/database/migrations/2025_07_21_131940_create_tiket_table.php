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
        Schema::create('tiket', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tempat_wisata_id')->constrained('tempat_wisata')->onDelete('cascade');
            $table->string('kode_tiket');
            $table->date('tanggal');
            $table->integer('stok');
            $table->decimal('harga', 10, 2); // tambahkan harga tiket jika belum ada
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket');
    }
};
