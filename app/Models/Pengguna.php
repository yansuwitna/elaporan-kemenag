<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengguna extends Authenticatable
{
    use HasFactory;

    protected $table = 'pengguna';

    protected $fillable = [
        'nip',
        'nama_lengkap',
        'kata_sandi',
        'peran',
        'seksi_id',
    ];

    protected $hidden = [
        'kata_sandi',
    ];

    public function getAuthPassword()
    {
        return $this->kata_sandi;
    }
}
