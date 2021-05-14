<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Favourite;

class FavouritesController extends Controller
{
    // Add offer to favourite
    public function store(Offer $offer) 
    {
        auth()->user()->student->favourites()->attach($offer);

        return back();
    }

    // Remove offer from favourite
    public function destroy(Offer $offer) 
    {
        auth()->user()->student->favourites()->detach($offer);

        return back();
    }
}
