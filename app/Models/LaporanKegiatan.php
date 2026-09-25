<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LaporanKegiatan extends Model
{
    protected $table = 'laporan_kegiatan';
    protected $fillable = ['pengguna_id', 'tanggal_kegiatan', 'judul_kegiatan', 'deskripsi', 'id_file_gdrive'];
}
