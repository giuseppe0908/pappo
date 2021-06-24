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
                'name' => 'Pizzeria Vesuvio',
                'description' => 'La pizzeria Vesuvio di Portici offre una pizza fragrante e leggera, seguendo i dettami della vera pizza
                napoletana. Impasto morbido, ingredienti di prima scelta e prodotti DOP di origine campana. La
                ricerca costante della qualità è la caratteristica principale della Pizzeria. Oggi, inoltre, l’offerta della
                pizzeria Vesuvio si allarga alle pizze senza glutine e a quelle con farina integrale, per venire incontro
                alle esigenze dei clienti.',
                'slug' => 'pizzeria-vesuvio',
                'address' => 'via Fasulla, 123',
                'telephone_number' => '3333331298',
                'photo' => './img/restaurants/pizza-restaurant.jpg'
            ],
            [
                'user_id' => '2',
                'name' => 'Puerto Mexico',
                'description' => 'In origine México al 104 nel rione Monti, divenuto poi México all’Aventino per circa un ventennio, oggi il
                ristorante, a dispetto dell’età e della sua lunga storia, ha ancora voglia di innovarsi e divertire. Ne è nato un
                locale tutto da scoprire e vivere, nell’atmosfera intima e nel gusto, naturalmente in pieno sabor de México. In origine México al 104 nel rione Monti, divenuto poi México all’Aventino per circa un ventennio, oggi il
                ristorante, a dispetto dell’età e della sua lunga storia, ha ancora voglia di innovarsi e divertire. Ne è nato un
                locale tutto da scoprire e vivere, nell’atmosfera intima e nel gusto, naturalmente in pieno sabor de México.',
                'slug' => 'puerto-mexico',
                'address' => 'via Dario, 17',
                'telephone_number' => '33845190293',
                'photo' => './img/restaurants/mexican-cuisine-4-540x360.jpg'
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
