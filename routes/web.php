<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\OtentikasiKontroler;
use App\Http\Controllers\DasborKontroler;

Route::get('/', function () {
    return redirect('/masuk');
});

Route::get('/masuk', [OtentikasiKontroler::class, 'tampilMasuk'])->name('masuk');
Route::post('/masuk', [OtentikasiKontroler::class, 'prosesMasuk']);
Route::post('/keluar', [OtentikasiKontroler::class, 'keluar'])->name('keluar');

Route::middleware(['auth'])->group(function () {
    Route::get('/dasbor', [DasborKontroler::class, 'indeks'])->name('dasbor');
});

