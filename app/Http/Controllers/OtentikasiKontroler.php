<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class OtentikasiKontroler extends Controller
{
    public function tampilMasuk()
    {
        return Inertia::render('Halaman/Masuk');
    }

    public function prosesMasuk(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $usernameAtauNip = $request->username;
        $kataSandi = $request->password;

        // Coba login sebagai Admin
        if (Auth::guard('admin')->attempt(['nama_pengguna' => $usernameAtauNip, 'password' => $kataSandi])) {
            $request->session()->regenerate();
            return redirect()->route('dasbor');
        }

        // Coba login sebagai Pengguna (NIP)
        if (Auth::guard('pengguna')->attempt(['nip' => $usernameAtauNip, 'password' => $kataSandi])) {
            $request->session()->regenerate();
            return redirect()->route('dasbor');
        }

        // Jika keduanya gagal
        return back()->withErrors([
            'username' => 'Username/NIP atau kata sandi yang Anda masukkan salah.',
        ]);
    }

    public function keluar(Request $request)
    {
        if (Auth::guard('admin')->check()) {
            Auth::guard('admin')->logout();
        } elseif (Auth::guard('pengguna')->check()) {
            Auth::guard('pengguna')->logout();
        }

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/masuk');
    }
}
