<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = [
        'id',
        'name',
        'description',
        'user_id',
        'slug',
        'address',
        'telephone_number',
        'photo',
      ];
      
      public function user(){
        return $this->belongsTo('App\User');
      }

      public function categories(){
        return $this->belongsToMany('App\Category', 'category_restaurant');
      } 

      public function foods(){
        return $this->hasMany('App\Food', 'id', 'restaurant_id');
      }

      public function orders(){
        return $this->hasMany('App\Order');
      }

}
