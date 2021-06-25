<?php

namespace App\Http\Controllers;

use App\Restaurant;
use App\Food;
use App\Category;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurant = Restaurant::with('categories')->get();

        return response()->json([
          'data' => $restaurant,
          'success' => true
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(string $slug, Food $food)
    {
		$restaurant = Restaurant::where('slug', $slug)->first();
        $foods = Food::where('restaurant_id', $restaurant->id)->orderBy('created_at', 'desc')->get();
        return view('guests.restaurants.show', compact('restaurant', 'foods'));
    }

    public function restaurantByCategory($categoryIndex)
    {
      $category = Category::with('restaurants')->where('id', '=', $categoryIndex)->first();
  
      return response()->json([
        'data' => $category->restaurants,
        'success' => true,
      ]);
    }
}
