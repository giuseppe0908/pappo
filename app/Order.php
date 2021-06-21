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
    ];

    public function foods(){
        return $this->belongsToMany('App\Food');
    }

    public function restaurants(){
        return $this->hasMany('App\Restaurant');
    }
}
