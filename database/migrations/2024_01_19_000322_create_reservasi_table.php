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
        Schema::create('reservasi', function (Blueprint $table) {
            $table->id('id_reservasi');
            $table->foreignId('id_bisnis');
            $table->foreignId('id_pengunjung');
            $table->foreignId('id_typekamar')->nullable();
            $table->string('jumlah_orang');
            $table->string('jumlah_kamar');
            $table->date('checkin');
            $table->date('checkout');
            $table->string('kode_booking');
            $table->string('total_harga');
            $table->string('status');
            $table->string('bukti_transfer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservasi');
    }
};
