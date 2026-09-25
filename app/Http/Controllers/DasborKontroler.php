<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class DasborKontroler extends Controller
{
    public function indeks()
    {
        return Inertia::render('Halaman/Dasbor');
    }
}
