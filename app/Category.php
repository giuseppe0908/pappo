<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'img',
      ];
      
      public function restaurants()
      {
        return $this->belongsToMany('App\Restaurant', 'category_restaurant');
      }
}
