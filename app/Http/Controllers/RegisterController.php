<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index(){

        if (Auth::check()){
            $cartCount = Cart::where('user_id', Auth::user()->id)->count();
        } else {
            $cartCount = 0;
        }
        return view('register.index', compact('cartCount'));
    }

    public function store(Request $request){
        $validatedData = $request->validate(
            [
                'name' => 'required|max:255',
                'username' => 'required|min:3|max:255|unique:users',
                'email' => 'required|email:dns|unique:users',
                'password' => 'required|min:5|max:255'
            ]
            );

            User::create($validatedData);

            return redirect('/login')->with('success', 'Registration successfull!!');
    }
}
