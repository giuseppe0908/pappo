<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Restaurant;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $categories = Category::all();
        return view('guests.index', compact('categories'));
    }
}
