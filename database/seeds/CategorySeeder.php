<?php

use Illuminate\Database\Seeder;
use App\Category;

use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'Cinese',
                'img' => './img/categories/cinese.png'
            ],
            [
                'name' => 'Giapponese', 
                'img' => './img/categories/giapponese.png'
            ],
            [
                'name' => 'Hamburger',
                'img' => './img/categories/hamburger.png'
            ],
            [
                'name' => 'Indiana',
                'img' => './img/categories/indiana.png'
            ],
            [
                'name' => 'Messicana',
                'img' => './img/categories/messicana.png'
            ],
            [
                'name' => 'Pizza',
                'img' => './img/categories/pizza.png'
            ],
            [
                'name' => 'Poke',
                'img' => './img/categories/poke.png'
            ],
            [
                'name' => 'Vegetariana',
                'img' => './img/categories/vegetariana.png'
            ],
        ];
            
        foreach ($categories as $category) {
            
            $category_obj = new Category();
            $category_obj->name = $category['name'];
            $category_obj->img = $category['img'];
            // $category_obj->slug = Str::slug($category, '-');

            $category_obj->save();
        }
    }
}
