<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Product;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        // Ambil order terbaru dari semua order
        $latestOrder = Order::latest()->first();

        if ($latestOrder) {
            // Ambil semua item dari order tersebut
            $orders = OrderItem::where('order_id', $latestOrder->id)->get();
            $cartCount = 0;
        } else {
            $orders = collect(); // kosong jika tidak ada order
            $cartCount = 0;
        }

        $grandTotal = $orders->sum(function ($orderItems) {
            return $orderItems->unit_price * $orderItems->quantity; 
        });

        $tax = $grandTotal * 0.01;

        $totalFinal = $grandTotal + $tax;

        Carbon::setLocale('id');
        $tanggalLengkap = Carbon::now()->translatedFormat('d F Y');

        return view('invoice', compact('orders', 'cartCount', 'tanggalLengkap', 'latestOrder', 'grandTotal', 'tax', 'totalFinal'));
    }
}
