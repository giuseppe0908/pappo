<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable =[
        'name',
        'description',
        'price',
        'available',
        'photo',
        'restaurant_id',
      ];

    public function restaurant(){
        return $this->hasMany('App\Restaurant');
    }

    public function orders(){
        return $this->belongsToMany('App\Order');
    }

}
