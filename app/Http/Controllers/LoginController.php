<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index()
    {
        // Pastikan mengirimkan cartCount, set ke 0 jika pengguna belum login
        if (Auth::check()) {
            // Jika pengguna sudah login, hitung jumlah keranjang berdasarkan user_id
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            // Jika pengguna belum login, set jumlah keranjang menjadi 0
            $cartCount = 0;
        }

        return view('login.index', compact('cartCount')); // Mengirimkan cartCount ke view
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Cek apakah pengguna adalah admin
            if (Auth::user()->is_admin == 1) {
                // Redirect ke dashboard.index jika is_admin bernilai 1
                return redirect('/dashboard');
            }

            // Jika bukan admin, redirect ke halaman yang dituju sebelumnya
            return redirect()->intended('/');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        return redirect('/');
    }

}
