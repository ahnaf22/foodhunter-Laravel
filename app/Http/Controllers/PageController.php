<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    //
    public function homePage()
    {
        $categories = Category::where('parent_id',NULL)->orderBy('name', 'asc')->get();
        return view('frontend.indexfiles.index',compact('categories'));
    }


    // seller registration
    public function sellerRegistration()
    {
        if(Auth::check())
        {
            return view('frontend.sellerReg.sellerReg');
        }
        else{
            return redirect('/');
        }
    }
}
