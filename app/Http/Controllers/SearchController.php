<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //
    public function searchShops(Request $request)
    {
        $search = $request->search_string;
        $searchedShops = Shop::orWhere('name','like','%'.$search.'%')
                                ->orwhere('location','like','%'.$search.'%')->get();
        return view('frontend.shopFiles.shopsearch')->with('shops', $searchedShops)->with('search',$search);
    }
}
