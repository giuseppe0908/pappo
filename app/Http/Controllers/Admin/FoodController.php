<?php

namespace App\Http\Controllers\Admin;

use App\Food;
use App\User;
use App\Restaurant;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Storage;


class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = Food::where('restaurant_id', Auth::id())
        ->orderBy('created_at', 'desc')
        ->get();

        return view('admin.restaurants.show', compact('foods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRestaurant(Request $request)
    {
        $restaurant = $request->all();
        return view('admin.foods.create', compact('restaurant'));
    }

    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'price' => 'required|numeric',
            'available' => 'boolean',
            'photo' => 'image|max:100|nullable',
            'restaurant_id' => 'exists:restaurants,id',
          ]);

          $data = $request->all();

          $photo = null;
          if (array_key_exists('photo', $data)) {
              $photo = Storage::put('uploads', $data['photo']);
            }


          $food = new Food();
          $food->fill($data);
          $food->photo = 'storage/'.$photo;

          $food->save();

          return redirect()->route('admin.restaurants.index')->with('success', 'Il piatto "' . $food->name . '" è stato creato correttamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function show(Food $food)
    {
        return view('admin.restaurants.show',compact('food'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function edit(Food $food)
    {

        return view('admin.foods.edit',compact('food'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Food $food)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'price' => 'required|numeric',
            'available' => 'required|boolean',
            'photo' => 'image|max:100|nullable',
            'restaurant_id' => 'exists:restaurants,id',
          ]);

          $data = $request->all();

          $photo = null;
          if (array_key_exists('photo', $data)) {
              $photo = Storage::put('uploads', $data['photo']);
              $data['photo'] = 'storage/'.$photo;
            }

          $food->update($data);


          return redirect()->route('admin.restaurants.index')->with('success', 'Il piatto "' . $food->name . '" è stato modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Food  $food
     * @return \Illuminate\Http\Response
     */
    public function destroy(Food $food)
    {
        //
    }
}
