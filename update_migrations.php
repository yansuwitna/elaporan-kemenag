<?php

$migrationsPath = __DIR__ . '/database/migrations/';
$files = scandir($migrationsPath);

foreach ($files as $file) {
    if (strpos($file, 'create_admins_table') !== false) {
        $content = file_get_contents($migrationsPath . $file);
        $content = str_replace(
            '$table->id();',
            '$table->id();' . "\n" . '            $table->string(\'nama_pengguna\')->unique();' . "\n" . '            $table->string(\'kata_sandi\');',
            $content
        );
        file_put_contents($migrationsPath . $file, $content);
    }

    if (strpos($file, 'create_seksis_table') !== false) {
        $content = file_get_contents($migrationsPath . $file);
        $content = str_replace(
            '$table->id();',
            '$table->id();' . "\n" . '            $table->string(\'nama_seksi\');',
            $content
        );
        file_put_contents($migrationsPath . $file, $content);
    }

    if (strpos($file, 'create_penggunas_table') !== false) {
        $content = file_get_contents($migrationsPath . $file);
        $content = str_replace(
            '$table->id();',
            '$table->id();' . "\n" . '            $table->string(\'nip\')->unique();' . "\n" . '            $table->string(\'nama_lengkap\');' . "\n" . '            $table->string(\'kata_sandi\');' . "\n" . '            $table->enum(\'peran\', [\'kepala_kantor\', \'ktu\', \'kasi\', \'pegawai\']);' . "\n" . '            $table->foreignId(\'seksi_id\')->nullable()->constrained(\'seksi\')->nullOnDelete();',
            $content
        );
        file_put_contents($migrationsPath . $file, $content);
    }

    if (strpos($file, 'create_laporan_kegiatans_table') !== false) {
        $content = file_get_contents($migrationsPath . $file);
        $content = str_replace(
            '$table->id();',
            '$table->id();' . "\n" . '            $table->foreignId(\'pengguna_id\')->constrained(\'pengguna\')->cascadeOnDelete();' . "\n" . '            $table->date(\'tanggal_kegiatan\');' . "\n" . '            $table->string(\'judul_kegiatan\');' . "\n" . '            $table->text(\'deskripsi\');' . "\n" . '            $table->string(\'id_file_gdrive\')->nullable();',
            $content
        );
        file_put_contents($migrationsPath . $file, $content);
    }

    if (strpos($file, 'create_riwayat_mutasis_table') !== false) {
        $content = file_get_contents($migrationsPath . $file);
        $content = str_replace(
            '$table->id();',
            '$table->id();' . "\n" . '            $table->foreignId(\'pengguna_id\')->constrained(\'pengguna\')->cascadeOnDelete();' . "\n" . '            $table->foreignId(\'seksi_asal_id\')->nullable()->constrained(\'seksi\')->nullOnDelete();' . "\n" . '            $table->foreignId(\'seksi_tujuan_id\')->constrained(\'seksi\')->cascadeOnDelete();' . "\n" . '            $table->foreignId(\'admin_id\')->constrained(\'admin\')->cascadeOnDelete();' . "\n" . '            $table->dateTime(\'tanggal_mutasi\');' . "\n" . '            $table->text(\'keterangan\')->nullable();',
            $content
        );
        file_put_contents($migrationsPath . $file, $content);
    }
}
