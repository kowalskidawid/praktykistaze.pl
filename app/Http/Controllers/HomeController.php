<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Location;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $offers = Offer::latest()->take(3)->get();
        $offersCount = Offer::all()->count();
        $locations = Location::get();
        $categories = Category::get();
        $types = Type::get();

        return view('index', compact('offers', 'offersCount', 'locations', 'categories', 'types'));
    }
}
