<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{

    protected $fillable = [
        'category_id', 
        'shop_id',
        'title',
        'description',
        'slug',
        'price',
        'image' 
        
    ];


    public function shop()
    {
        return $this->belongsTo(Shop::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
