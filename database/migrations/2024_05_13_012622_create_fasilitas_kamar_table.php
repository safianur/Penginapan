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
        Schema::create('fasilitas_kamar', function (Blueprint $table) {
            $table->id('id_faskam');
            $table->foreignId('id_typekamar');
            $table->string('nm_faskam');
            $table->string('jumlah_faskam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_kamar');
    }
};
