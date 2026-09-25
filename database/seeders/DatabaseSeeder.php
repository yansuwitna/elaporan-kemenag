<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Pengguna;
use App\Models\Seksi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Buat Admin
        Admin::create([
            'nama_pengguna' => 'admin',
            'kata_sandi' => Hash::make('Admin123!'),
        ]);

        // Buat Seksi
        $seksi = Seksi::create([
            'nama_seksi' => 'Bimas Islam',
        ]);

        // Buat Kasi (Kepala Seksi)
        Pengguna::create([
            'nip' => '198001012005011001',
            'nama_lengkap' => 'Bapak Kasi Bimas',
            'kata_sandi' => Hash::make('kasi123'),
            'peran' => 'kasi',
            'seksi_id' => $seksi->id,
        ]);

        // Buat Pegawai
        Pengguna::create([
            'nip' => '199001012015011002',
            'nama_lengkap' => 'Budi Pegawai',
            'kata_sandi' => Hash::make('pegawai123'),
            'peran' => 'pegawai',
            'seksi_id' => $seksi->id,
        ]);

        // Buat Kepala Kantor
        Pengguna::create([
            'nip' => '197001012000011003',
            'nama_lengkap' => 'Bapak Kepala Kantor',
            'kata_sandi' => Hash::make('kepala123'),
            'peran' => 'kepala_kantor',
            'seksi_id' => null,
        ]);
    }
}
