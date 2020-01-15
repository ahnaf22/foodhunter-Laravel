<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Basket extends Model
{
    protected $fillable = [
        'user_id', 
        'order_id', 
        'food_id', 
        'shop_id',
        'quantity',

    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    
    public function food()
    {
        return $this->belongsTo(Food::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public static function totalBasket()
    {
        $basket = Basket::where('user_id',Auth::id())
                         ->where('order_id',NULL)->get();
        $totalbasket= $basket->count();
        
        return $totalbasket;
    }

    public static function basketItems()
    {
        $basket = Basket::where('user_id',Auth::id())
                         ->where('order_id',NULL)->get();
        
        return $basket;
    }
}
