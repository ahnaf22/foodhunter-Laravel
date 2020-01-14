<?php

namespace App\Http\Controllers;

use App\Category;
use App\Food;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function homePage()
    {
        $homeFoods= Food::all()->take(4);
        $categories = Category::where('parent_id',NULL)->orderBy('name', 'asc')->get();
        return view('frontend.indexfiles.index',compact('categories','homeFoods'));
    }


    // seller registration
    public function sellerRegistration()
    {
        if(Auth::check())
        {
            $user= Auth::user();
            if($user->seller_request)
            {
                session()->flash("success","You have already applied for seller, please wait for confirmation");
                return redirect()->route('home');
            }
            elseif($user->is_seller)
            {
                session()->flash("success","You are already a seller, start adding foods from dashboard");
                return redirect()->route('home');
            }
            else{
                return view('frontend.sellerReg.sellerReg');
            }
            
        }
        else{
            return redirect('/');
        }
    }
}
