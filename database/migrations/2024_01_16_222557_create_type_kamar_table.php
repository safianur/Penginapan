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
        Schema::create('type_kamar', function (Blueprint $table) {
            $table->id('id_typekamar');
            $table->foreignId('id_bisnis');
            $table->string('nm_typekamar');
            $table->string('harga');
            $table->string('stok_kamar');
            $table->string('gmbr_typekamar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_kamar');
    }
};
