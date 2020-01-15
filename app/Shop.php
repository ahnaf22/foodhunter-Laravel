<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $fillable = [
        'name', 
        'location', 
        'open_time', 
        'close_time',
        'shop_logo',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function foods()
    {
        return $this->hasMany(Food::class);
    }

    public function order()
    {
        return $this->hasMany(Order::class);
    }

    public function basket()
    {
        return $this->hasMany(Basket::class);
    }

}
