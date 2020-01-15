<?php

namespace App\Http\Controllers;

use App\Basket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            if(Basket::basketItems()->count() == 0)
            {
                return redirect()->route('homePage');
            }
            else{
                return view('frontend.checkoutfiles.index');
            }
          
        }
        else{
            return redirect()->route('homePage');
        }
    }
}
