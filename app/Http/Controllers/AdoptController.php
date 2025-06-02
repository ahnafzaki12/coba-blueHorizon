<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdoptController extends Controller
{
    public function index()
    {
        $products = Product::all();
        if (Auth::check()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            $cartCount = 0;
        }

        return view('adopt', compact('products', 'cartCount')); // Mengirimkan cartCount ke view
    }
}
