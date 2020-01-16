<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    // simple use orders
    public function user_orders()
    {
        if(Auth::user())
        {
            $user=Auth::user();
            $orders = Order::where('user_id',$user->id)->orderBy('id','desc')->get();

            return view('backend.pages.simpleUserPages.userorders',compact('orders'));
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
    }


    // delete order
    public function delete_orders(Request $request)
    {
        if(Auth::user())
        {
            $order_id= $request->order_id;
            $order = Order::find($order_id);
            //dd($order);
            $order->delete();
            session()->flash('success','order cancelled');
            return back();
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
    }

    // view order
    public function view_order(Request $request)
    {
        if(Auth::user())
        {
            $allbasket = Basket:: where('order_id',$request->order_id)->get();
            $shopname = Order::find($request->order_id)->shop->name;
            $totalprice= Order::find($request->order_id)->total_price;
            $order=Order::find($request->order_id);;

            return view('backend.pages.orders.view',compact('allbasket','shopname','totalprice','order'));
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
    }


    // seller order checks

    
}
