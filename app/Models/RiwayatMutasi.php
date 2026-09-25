<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RiwayatMutasi extends Model
{
    protected $table = 'riwayat_mutasi';
    protected $fillable = ['pengguna_id', 'seksi_asal_id', 'seksi_tujuan_id', 'admin_id', 'tanggal_mutasi', 'keterangan'];
}
