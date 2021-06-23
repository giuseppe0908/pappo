<?php

use Illuminate\Database\Seeder;
use App\Restaurant;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $restaurants = [
            [
                'user_id' => '1',
                'name' => 'Il Calabrese',
                'description' => 'nduja',
                'slug' => 'il-calabrese',
                'address' => 'via Fasulla, 123',
                'telephone_number' => '3333331298',
                'photo' => 'img'
            ],
            [
                'user_id' => '2',
                'name' => 'Il Dario',
                'description' => 'è di Dario',
                'slug' => 'il-dario',
                'address' => 'via Dario, 17',
                'telephone_number' => '33845190293',
                'photo' => 'img'
            ]
        ];

        foreach ($restaurants as $restaurant) {
            $restaurant_obj = new Restaurant();
            $restaurant_obj->user_id = $restaurant['user_id'];
            $restaurant_obj->name = $restaurant['name'];
            $restaurant_obj->description = $restaurant['description'];
            $restaurant_obj->slug = $restaurant['slug'];
            $restaurant_obj->address = $restaurant['address'];
            $restaurant_obj->telephone_number = $restaurant['telephone_number'];          
            $restaurant_obj->photo = $restaurant['photo'];
            $restaurant_obj->save();
        }
    }
}
