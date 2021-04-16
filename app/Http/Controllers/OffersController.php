<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Category;
use App\Models\Location;

class OffersController extends Controller
{
    // Display a listing of the resource.
    public function index(Request $request)
    {
        $locations = Location::get();
        $categories = Category::get();

        $perPage = 12;
        if ($request->location) {
            $offers = Offer::where('location_id', '=', $request->location)
                        ->paginate($perPage);
        } else {
            $offers = Offer::paginate($perPage);
        }

        return view('offers.index', compact('offers', 'locations', 'categories'));
    }
    // Display the specified resource.
    public function show()
    {
        // TODO
    }
    // Apply for the offer.
    public function apply()
    {
        // TODO
    }
    // Add offer to favourites.
    public function favourite()
    {
        // TODO
    }
    // Remove offer from favourites.
    public function unfavourite()
    {
        // TODO
    }
}
