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
        Schema::create('pengguna', function (Blueprint $table) {
            $table->id();
            $table->string('nip')->unique();
            $table->string('nama_lengkap');
            $table->string('kata_sandi');
            $table->enum('peran', ['kepala_kantor', 'ktu', 'kasi', 'pegawai']);
            $table->foreignId('seksi_id')->nullable()->constrained('seksi')->nullOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengguna');
    }
};
