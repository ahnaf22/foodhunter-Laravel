<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Order;
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

    public function store(Request $request)
    {
        $this->validate($request,[
            'phone' => 'required | max:12 |numeric',
            'address' => 'max:150',
            'dinetime' => 'max:8',
            'instructions' => 'max:150'
        ]);

        $order = new Order();
        $order->user_id= Auth::id();
        $order->shop_id= $request->shop_id;
        $order->total_price= $request->totalprice;
        $order->ip_address= request()->ip();
        $order->phone_no =$request->phone;
        $order->order_type=$request->chktype;
        $order->dine_time=$request->dinetime;
        $order->delivery_address=$request->address;
        $order->instructions=$request->instructions;

        $order->save();

        foreach(Basket::basketItems() as $basket)
        {
            $basket->order_id=$order->id;
            $basket->save();
        }

        session()->flash("success","Order Submitted, wait for admin approval!");
        return redirect()->route('food.homemade');
    }
}
