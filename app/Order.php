<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 
        'shop_id', 
        'total_price', 
        'ip_address',
        'phone_no',
        'order_type',
        'dine_time',
        'delivery_address',
        'instructions',
        'is_confirmed',
        'is_paid',
        'is_completed',
    ];

    public function basket()
    {
        return $this->hasMany(Basket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }
}
