<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function foodDetails(){
        return view('frontend.foodDetailFiles.foodDetails');
    }
}
