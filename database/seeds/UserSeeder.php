<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Mario',
                'surname' => 'Rossi',
                'p_iva' => '12341234567',
                'email' => 'mario.rossi@ciao.com',
                'password' => 'mario'
            ],
            [
                'name' => 'Dario',
                'surname' => 'Bianchi',
                'p_iva' =>'12312312345',
                'email' => 'dario.bianchi@ciao.com',
                'password' => 'leggenDario'
            ]
        ]; 

        foreach ($users as $user) {
            $user_obj = new User();
            $user_obj->name = $user['name'];
            $user_obj->surname = $user['surname'];
            $user_obj->p_iva = $user['p_iva'];
            $user_obj->email = $user['email'];
            $user_obj->password = Hash::make($user['password']);
            $user_obj->save();
        };
    }
}
