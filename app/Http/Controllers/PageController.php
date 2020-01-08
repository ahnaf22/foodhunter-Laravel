<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    //
    public function homePage()
    {
        $categories = Category::where('parent_id',NULL)->orderBy('name', 'asc')->get();
        return view('frontend.indexfiles.index',compact('categories'));
    }
}
