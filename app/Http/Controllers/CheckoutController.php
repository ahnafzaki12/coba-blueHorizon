<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {

        if (!Auth::check()) {
            // Jika belum login, kembalikan ke halaman sebelumnya dengan pesan error
            return redirect('/login')->with('error', 'Please login first to see items in the cart.');
        }

        $carts = Cart::where('user_id', Auth::user()->id)->get();
        $cartCount = $carts->count();  // Menggunakan $carts untuk mendapatkan jumlah

        $grand_total = $carts->sum(function ($cart_item) {
            return $cart_item->price * $cart_item->quantity;
        });

        return view('checkout', compact('carts', 'cartCount', 'grand_total'));
    }

    public function store(Request $request)
    {
        if (!Auth::check()) {
        return redirect('/login')->with('error', 'Please login first.');
    }

    $request->validate([
        'name' => 'required|string',
        'company' => 'nullable|string',
        'email' => 'required|email',
        'country' => 'required|string',
        'terms' => 'accepted',
    ]);

    $userId = Auth::id();
    $cartItems = Cart::where('user_id', $userId)->get();

    if ($cartItems->isEmpty()) {
        return back()->with('error', 'Your cart is empty.');
    }

    // Total harga
    $totalPrice = 0;

    // Format total_products seperti: Staghorn Coral (1), Coral Garden (3)
    $productList = [];

    foreach ($cartItems as $item) {
        $totalPrice += $item->price * $item->quantity;
        $productList[] = "{$item->name} ({$item->quantity})";
    }

    $productString = implode(', ', $productList);

    // Simpan ke tabel orders
    $order = Order::create([
        'name' => $request->name,
        'company' => $request->company ?? '',
        'email' => $request->email,
        'country' => $request->country,
        'total_products' => $productString,
        'total_price' => $totalPrice,
        'user_id' => $userId,
    ]);

    // Simpan ke tabel order_items
    foreach ($cartItems as $item) {
        // Create order item untuk setiap produk di keranjang
        OrderItem::create([
            'order_id' => $order->id, // Relasi ke order yang baru saja dibuat
            'product_name' => $item->name,
            'quantity' => $item->quantity,
            'unit_price' => $item->price,
            'user_id' => $userId
        ]);

        $product = \App\Models\Product::where('name', $item->name)->first();
        if ($product) {
            $product->stock -= $item->quantity; // Kurangi stok
            $product->save(); // Simpan perubahan stok
        }
    }

    // Hapus isi cart setelah order
    Cart::where('user_id', $userId)->delete();

    return redirect('/invoice')->with('success', 'Order placed successfully!');
    }
}
