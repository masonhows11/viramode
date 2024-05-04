<?php

namespace App\Http\Controllers\Front\Cart;


use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
//use App\Models\CartItems;
//use App\Models\Product;
//use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;

class CartController extends Controller
{


    public function checkoutCart()
    {

        if (Auth::check())
        {
            return view('front_end.cart.cart',['user' => Auth::id()]);

        } else {
            return redirect()->route('auth.login.form');
        }

    }


}
