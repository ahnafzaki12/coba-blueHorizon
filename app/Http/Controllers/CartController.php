<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (!Auth::check()) {
            // Jika belum login, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect('/login')->with('error', 'Please login first to see items in the cart.');
        }

        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $cartCount = $carts->count();  // Menggunakan $carts untuk mendapatkan jumlah

        $grandTotal = $carts->sum(function ($cart) {
            return $cart->price * $cart->quantity; // Assuming 'price' and 'quantity' are fields in the cart table
        });

        return view('cart', compact('carts', 'cartCount', 'grandTotal')); // Mengirimkan $cartCount ke view
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
        if (!Auth::check()) {
            // Jika belum login, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect('/login')->with('error', 'Please login first to add items to the cart.');
        }
        // Validasi input
        $request->validate([
            'name' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|string',
        ]);

        $userId = Auth::id();

        // Cek apakah produk sudah ada di cart untuk user yang sedang login
        $existingCartItem = Cart::where('user_id', $userId)
            ->where('name', $request->name)
            ->where('price', $request->price)
            ->where('image', $request->image)
            ->first();

        if ($existingCartItem) {
            // Jika sudah ada, tambah quantity-nya
            $existingCartItem->increment('quantity');
        } else {
            // Jika belum ada, tambahkan sebagai item baru
            Cart::create([
                'name' => $request->name,
                'price' => $request->price,
                'image' => $request->image,
                'user_id' => $userId,
                'quantity' => 1,
            ]);
        }

        return redirect('/adopt')->with('success', 'Product added to cart!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input quantity
        $request->validate([
            'quantity' => 'required|integer|min:1', // Pastikan quantity lebih dari atau sama dengan 1
        ]);

        // Cari item cart berdasarkan ID
        $cartItem = Cart::find($id);

        if ($cartItem) {
            // Update quantity
            $cartItem->quantity = $request->input('quantity');
            $cartItem->save();

            // Redirect kembali ke halaman cart atau halaman lain yang sesuai
            return redirect()->route('carts.index')->with('success', 'Quantity updated successfully!');
        } else {
            // Jika item tidak ditemukan, kirim pesan error
            return redirect()->route('carts.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('carts.index')->with('success', 'Product has been deleted');
    }

    
}
