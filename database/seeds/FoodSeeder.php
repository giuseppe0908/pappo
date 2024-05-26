<?php

use App\Food;
use Illuminate\Database\Seeder;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $foods = [
            [
                'restaurant_id' => '1',
                'name' => 'Pizzeria Vesuvio',
                'ingredients' => 'pomodoro,basilico e mozzarella',
                'price' => '5.9',
                'available' => '1',
                'photo' => './img/restaurants/pizza-restaurant.jpg'
            ],
            [
                'restaurant_id' => '2',
                'name' => 'Puerto Mexico',
                'ingredients' => 'molto buono.',
                'price' => '8.9',
                'available' => '1',
                'photo' => './img/restaurants/mexican-cuisine-4-540x360.jpg'
            ]
        ];

        foreach ($foods as $food) {
            $food_obj = new Food();
            $food_obj->restaurant_id = $food['restaurant_id'];
            $food_obj->name = $food['name'];
            $food_obj->ingredients = $food['ingredients'];
            $food_obj->price = $food['price'];
            $food_obj->available = $food['available'];          
            $food_obj->photo = $food['photo'];
            $food_obj->save();
        }
    }
}

