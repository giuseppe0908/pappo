<?php

namespace App\Http\Controllers\Admin;

use App\Restaurant;
use App\User;
use App\Category;
use App\Food;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $restaurants = Restaurant::where('user_id', Auth::id())
                    ->orderBy('created_at', 'desc')
                    ->get();

        return view('admin.restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.restaurants.create', compact('categories'));
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
            'address' => 'required|string|max:100',
            'telephone_number' => 'required|string|max:50',
            'photo' => 'image|max:100|nullable',
            'category_ids.*' => 'exists:categories,id',
          ]);

          $data = $request->all();

          $photo = NULL;
          if (array_key_exists('photo', $data)) {
            $photo = Storage::put('uploads', $data['photo']);
          }

          $data['user_id'] = Auth::id();

          $restaurant = new Restaurant();
          $restaurant->fill($data);

          $restaurant->slug = $this->generateSlug($restaurant->name);
          $restaurant->photo = 'storage/'.$photo;
          $restaurant->save();

          if (array_key_exists('category_ids', $data)) {
            $restaurant->categories()->attach($data['category_ids']);
          }

          return redirect()->route('admin.restaurants.index')->with('success', 'Il ristorante "' . $restaurant->name . '" è stato creato correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show($slug, Food $food)
    {
		    $restaurant = Restaurant::where('slug', $slug)->first();
        $foods = Food::where('restaurant_id', $restaurant->id)->orderBy('created_at', 'desc')->get();
        return view('admin.restaurants.show', compact('restaurant', 'foods'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories = Category::all();

        return view('admin.restaurants.edit', compact('restaurant', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'address' => 'required|string|max:100',
            'telephone_number' => 'required|string|max:50',
            'photo' => 'image|max:100|nullable',
            'category_ids.*' => 'exists:categories,id',
          ]);


          $data = $request->all();

          $data['slug'] = $this->generateSlug($data['name'], $restaurant->name != $data['name'], $restaurant->slug);

          if (array_key_exists('photo', $data)) {
            $photo = Storage::put('uploads', $data['photo']);
            $data['photo'] = 'storage/'.$photo;
          }

          $restaurant->update($data);

          if (array_key_exists('category_ids', $data)) {
            $restaurant->categories()->sync($data['category_ids']);
          } else {
            $restaurant->categories()->detach();
          }

          return redirect()->route('admin.restaurants.index')->with('success', 'Il ristorante "' . $restaurant->name . '" è stato modificato correttamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();

        return redirect()->route('admin.restaurants.index')->with('success', 'Il ristorante "' . $restaurant->name . '" è stato cancellato correttamente');
    }

    private function generateSlug(string $name, bool $change = true, string $old_slug = '')
    {
      if (!$change) {
        return $old_slug;
      }

      $slug = Str::slug($name, '-');
      $slug_base = $slug;
      $counter = 1;

      $restaurant_with_slug = Restaurant::where('slug', '=', $slug)->first();
      while($restaurant_with_slug) {
        $slug = $slug_base . '-' . $counter;
        $counter++;

        $restaurant_with_slug = Restaurant::where('slug', '=', $slug)->first();
      }

      return $slug;
    }
}
