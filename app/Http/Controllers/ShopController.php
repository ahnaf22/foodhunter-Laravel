<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function allShops()
    {
        $shops= Shop::all();
        return view('frontend.shopFiles.index',compact('shops'));
    }

    public function shopDetails($id)
    {
         $shop= Shop::find($id);
         return view('frontend.shopFiles.shopdetails',compact('shop'));
    }
}
