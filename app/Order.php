<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable =[
        'customer_name',
        'customer_surname',
        'customer_address',
        'customer_phone_number',
        'customer_email',
        'total',
        'restaurant_id',
        
    ];

    public function foods(){
        return $this->belongsToMany(Food::class, 'order_food', 'order_id', 'food_id');
    }

    public function restaurants(){
        return $this->belongsTo('App\Restaurant');
    }
}
