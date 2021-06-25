<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'HomeController@index')->name('index');
Route::get('restaurants/{slug}', 'RestaurantController@show')->name('restaurants.show');




Auth::routes();

Route::middleware('auth')->namespace('Admin')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'HomeController@index')->name('index');
    Route::resource('restaurants', 'RestaurantController');
    Route::post('dish', 'FoodController@getRestaurant')->name('getrestaurant');
    Route::resource('foods', 'FoodController');
});