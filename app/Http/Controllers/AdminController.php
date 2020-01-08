<?php

namespace App\Http\Controllers;

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
}
