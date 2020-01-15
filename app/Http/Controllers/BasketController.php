<?php

namespace App\Http\Controllers;

use App\Basket;
use App\Food;
use App\Shop;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{

    public function index()
    {
            return view('frontend.basketfiles.index');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'food_id' => 'required'
        ]);


        $food_id=$request->food_id;
        $foodshop_id= Food::find($food_id)->shop->id;



       


        //dd($foodshop_id);
        
        if(Auth::check())
        {
            // check if user is seller
            $usertype=Auth::user()->is_seller;
            if($usertype)
            {
                $usershop= Auth::user()->shop_id;
            }
            else{
                $usershop=Null;
            }



            if($usershop == $foodshop_id)
            {
                session()->flash("customerror","Cant buy from own shop");
                return back();
            }
            else{
                

                $previtems= Basket::where('user_id',Auth::id())
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

                    $basket= Basket::where('user_id',Auth::id())
                                   ->where('order_id',NULL)
                                   ->where('food_id',$food_id)->first();
                    
                    
                     if(!is_null($basket))
                     {
                         $basket->increment('quantity');
                     }
                     else{

                        $basket= new Basket();
                        $basket->user_id= Auth::id();
                        $basket->shop_id= $foodshop_id;
                        $basket->food_id= $food_id;
                        $basket->save();
    
                     }
              
                     
                    //dd($basket);
                    
                    
                    session()->flash("success","Item added to cart");
                    return back();

                }
                
                
             
            }
            
        }
        else{
            session()->flash("customerror","Please login to add food to basket");
            return redirect('login');
        }
    }

    public function update(Request $request)
    {
        $basketId=$request->basket_id;
        $quantity=$request->quantity;

         //dd($quantity);
        
        $basket=Basket::find($basketId);
    
        if(!is_null($basket))
        {
           $basket->quantity=$quantity;
           $basket->save();
        }
        else{
            return redirect()->route('basket');
        }

        session()->flash("success","Cart Updated!");
        return back();
    
    }

    public function delete(Request $request)
    {
        $basketId=$request->basket_id;
        $basket=Basket::find($basketId);

        if(!is_null($basket))
        {
           $basket->delete();
        }
        else{
            return redirect()->route('basket');
        }

        session()->flash("customerror","Cart deleted");
        return back();
    }
}
