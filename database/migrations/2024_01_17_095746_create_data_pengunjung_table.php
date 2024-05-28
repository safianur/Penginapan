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
        Schema::create('data_pengunjung', function (Blueprint $table) {
            $table->id('id_pengunjung');
            $table->string('nik_paspor');
            $table->string('nm_pengunjung');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir')->nullable();
            // $table->date('tanggal_lahir')->nullable()->change();
            $table->text('alamat');
            $table->string('email');
            $table->string('kontak');
            // $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pengunjung');
    }
};
