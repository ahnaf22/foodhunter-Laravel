<?php

namespace App\Http\Controllers\API;

use App\Basket;
use App\Food;
use App\Http\Controllers\Controller;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{


    public function store(Request $request)
    {


        $food_id=$request->food_id;
        $auth_id = $request->auth_id;

        $foodshop_id= Food::find($food_id)->shop->id;
    
        
        


        //dd($foodshop_id);
        
        if(!is_null($auth_id))
        {
            // check if user is seller
           
                

                $previtems= Basket::where('user_id',$auth_id)
                                    ->Where('order_id',NULL)->first();
                if(!is_null($previtems))
                {
                    $prevshopId= $previtems->shop_id;
                }else{
                    $prevshopId= $foodshop_id;
                }
               
                //dd($prevshopId);
            
                if($foodshop_id != $prevshopId)
                {
                    $shopname= Shop::find($prevshopId)->name;
                    session()->flash("customerror","Please order from same shop at a time or remove all from basket to order from new shop <br>
                                      You are ordering from: "."<a class='anchortag' href='shops/details/$prevshopId'> ".$shopname ."</a>");
                    return back();
                }
                else{

                    $basket= Basket::where('user_id',$auth_id)
                                   ->where('order_id',NULL)
                                   ->where('food_id',$food_id)->first();
                    
                    
                     if(!is_null($basket))
                     {
                         $basket->increment('quantity');
                     }
                     else{

                        $basket= new Basket();
                        $basket->user_id= $auth_id;
                        $basket->shop_id= $foodshop_id;
                        $basket->food_id= $food_id;
                        $basket->save();
    
                     }
              
                     
                    //dd($basket);
                    
                    $totalbasket= Basket::totalBasket();
    
                   
                    return response()->json($totalbasket);;

                }
                
                
             
            
        }
        else{
            // session()->flash("customerror","Please login to add food to basket");
            return json_encode(['url'=>url('login')]);
        }
    }

    
}
