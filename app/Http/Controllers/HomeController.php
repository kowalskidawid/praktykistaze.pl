<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Article;

class HomeController extends Controller
{
    public function index()
    {
        $offers = Offer::latest()->take(3)->get();
        $offersCount = Offer::all()->count();

        return view('index', compact('offers', 'offersCount'));
    }
}
