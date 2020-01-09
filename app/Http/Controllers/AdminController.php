<?php

namespace App\Http\Controllers;

use App\Shop;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        if(Auth::user())
        {
            $user= Auth::user();
            return view('backend.pages.index',compact('user'));
        }
        else{
            session()->flash('customerror','please login to enter the dashboard');
            return redirect('login');
        }
        
    }

    public function allusers()
    {
        if(Auth::user() && Auth::user()->is_admin )
        {
            $users= User::all();
            return view('backend.pages.users.userindex',compact('users'));
        }
        else{
            session()->flash('customerror','you ar not allowed to do that');
            return redirect('home');
        }
    }

    public function allsellers()
    {
        if(Auth::user() && Auth::user()->is_admin )
        {
            $users= User::where('is_seller',1)->get();
            return view('backend.pages.sellers.sellerindex',compact('users'));
        }
        else{
            session()->flash('customerror','you ar not allowed to do that');
            return redirect('home');
        }
    }

    public function sellerRequests()
    {
        if(Auth::user() && Auth::user()->is_admin )
        {
            $users= User::where('seller_request',1)->get();
            return view('backend.pages.sellers.requests',compact('users'));
        }
        else{
            session()->flash('customerror','you ar not allowed to do that');
            return redirect('home');
        }
    }
}
