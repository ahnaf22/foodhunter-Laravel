<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Order;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopController extends Controller
{
    //Frontend shops
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


    // seller shop functions backend

    public function seller_shopProfile()
    {
        if(Auth::user() && Auth::user()->is_seller)
        {
            $user=Auth::user();
            $shop = Shop::where('user_id',$user->id)->first();

            return view('backend.pages.shop.profile',compact('shop'));
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
        
    }

    public function seller_shopOrders()
    {
        if((Auth::user() && Auth::user()->is_seller))
        {
            $user=Auth::user();
            $orders = Order::where('shop_id',$user->shop->id)->orderBy('id','desc')->get();

            return view('backend.pages.shop.orders',compact('orders','user'));
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
        
    }

    public function seller_orderView(Request $request)
    {
        if(Auth::user())
        {
            $allbasket = Basket:: where('order_id',$request->order_id)->get();
            $shopname = Order::find($request->order_id)->shop->name;
            $totalprice= Order::find($request->order_id)->total_price;
            $order=Order::find($request->order_id);;
            $order->is_seenbyseller=1;
            $order->save();

            return view('backend.pages.shop.viewshoporder',compact('allbasket','shopname','totalprice','order'));
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
    }

    public function seller_orderComplete(Request $request)
    {
        if(Auth::user())
        {
            $order=Order::find($request->order_id);;
            $order->is_completed=1;
            $order->is_paid=1;
            $order->save();
            session()->flash('success','order completed!');
            return redirect()->route('admin.shop.orders');
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
    }
    public function seller_orderConfirm(Request $request)
    {
        if(Auth::user())
        {
            $order=Order::find($request->order_id);;
            $order->is_confirmed=1;
            $order->save();
            session()->flash('success','order confirmed!');
            return redirect()->route('admin.shop.orders');
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
    }
}
