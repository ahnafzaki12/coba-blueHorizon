<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdoptController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    if (Auth::check()) {
        $cartCount = Cart::where('user_id', Auth::user()->id)->count(); // Mengambil jumlah keranjang berdasarkan user yang login
    } else {
        $cartCount = 0; // Jika pengguna belum login, set jumlah keranjang menjadi 0
    }
    return view('home', compact('cartCount'));
});

Route::get('/adopt', [AdoptController::class, 'index']);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('logout', [LoginController::class, 'logout']);

Route::get('/change', [ProfileController::class, 'change']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(\App\Http\Middleware\IsAdmin::class);
Route::get('/dashboard/addAdmin', [DashboardController::class, 'addAdmin'])->middleware(\App\Http\Middleware\IsAdmin::class);
Route::post('/dashboard/storeAdmin', [DashboardController::class, 'storeAdmin'])->middleware(\App\Http\Middleware\IsAdmin::class);
Route::get('/dashboard/orders', [DashboardController::class, 'orders'])->middleware('auth');


Route::resource('products', ProductController::class)->middleware('auth');
Route::resource('carts', CartController::class);
Route::resource('checkout', CheckoutController::class);

Route::get('/invoice', [InvoiceController::class, 'index']);

Route::resource('profile', ProfileController::class)->middleware('auth');

Route::put('/changePassword', [ProfileController::class, 'changePassword'])->name('profile.changePassword');



