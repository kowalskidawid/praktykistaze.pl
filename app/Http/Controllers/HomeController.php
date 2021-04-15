<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;

class HomeController extends Controller
{
    public function home()
    {
        $offers = Offer::latest()->take(3)->get();

        return view('home', compact('offers'));
    }
}
