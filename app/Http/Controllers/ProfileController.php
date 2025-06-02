<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        if (Auth::check()) {
            $cartCount = Cart::where('user_id', Auth::user()->id)->count(); // Mengambil jumlah keranjang berdasarkan user yang login
        } else {
            $cartCount = 0; // Jika pengguna belum login, set jumlah keranjang menjadi 0
        }

        $user = Auth::user();

        $name = $user->name;
        $username = $user->username;
        $email = $user->email;

        $user_id = Auth::id();

        $orders = OrderItem::where('user_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();

        $total_adoptions = OrderItem::where('user_id', $user_id)->sum('quantity');
        $total_contribution = OrderItem::where('user_id', $user_id)->get()->sum(function ($item) {
            return $item->quantity * $item->unit_price;
        });

        $member_since = Auth::user()->created_at->format('Y');

        return view('profile', compact('name', 'username', 'email', 'cartCount', 'orders', 'total_adoptions', 'total_contribution', 'member_since'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = Auth::user();  // user yang sedang login

        // Aturan validasi
        $rules = [
            'name' => 'required|string|min:3|max:255',
            'username' => 'required|string|min:3|max:50|unique:users,username,' . $user->id,
            'email' => 'required|email|unique:users,email,' . $user->id,
        ];

        // Validasi data input
        $validatedData = $request->validate($rules);

        // Update data user dengan data yang tervalidasi
        $user->update($validatedData);

        // Redirect kembali ke halaman edit profil dengan pesan sukses
        return redirect()->route('profile.edit', ['profile' => $user->id])
            ->with('success', 'Profil berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function change()
    {

        if (Auth::check()) {
            // Jika pengguna sudah login, hitung jumlah keranjang berdasarkan user_id
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            // Jika pengguna belum login, set jumlah keranjang menjadi 0
            $cartCount = 0;
        }
        return view('changePassword', compact('cartCount'));
    }

    // Controller method
    public function changePassword(Request $request)
    {
        // Validasi
        $validated = $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:5|confirmed'
        ]);

        // Periksa apakah password saat ini cocok
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Current Password is incorrect.']);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Perbarui password
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        // Redirect ke halaman edit profil dengan parameter profile (ID user)
        return redirect()->route('profile.edit', Auth::user()->id)->with('success', 'Password changed successfully.');
    }
}
