<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable =[
        'name',
        'description',
        'price',
        'avaible',
        'photo',
        'restaurant_id',
      ];
    public function restaurant(){
        return $this->hasMany('App\Restaurant');
    }
}
