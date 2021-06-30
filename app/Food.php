<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable =[
        'name',
        'ingredients',
        'price',
        'available',
        'photo',
        'restaurant_id',
      ];

    protected $table = 'foods';

    public function restaurants(){
        return $this->belongsTo('App\Restaurant');
    }

    public function orders(){
        return $this->belongsToMany('App\Order');
    }

}
