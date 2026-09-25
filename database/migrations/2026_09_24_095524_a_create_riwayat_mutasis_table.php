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
        Schema::create('riwayat_mutasi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengguna_id')->constrained('pengguna')->cascadeOnDelete();
            $table->foreignId('seksi_asal_id')->nullable()->constrained('seksi')->nullOnDelete();
            $table->foreignId('seksi_tujuan_id')->constrained('seksi')->cascadeOnDelete();
            $table->foreignId('admin_id')->constrained('admin')->cascadeOnDelete();
            $table->dateTime('tanggal_mutasi');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_mutasi');
    }
};
