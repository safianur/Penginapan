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
        Schema::create('fasilitas_public', function (Blueprint $table) {
            $table->id('id_faspub');
            $table->foreignId('id_bisnis');
            $table->string('nm_faspub');
            $table->string('estimasi');
            $table->string('gmbr_faspub');
            $table->string('link');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitas_public');
    }
};
