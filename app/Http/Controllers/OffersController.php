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
        // List of values for select inputs in form
        $locations = Location::get();
        $categories = Category::get();
        // Requested values for filtering the results
        $location = $request->location;
        $category = $request->category;
        // Number of items per page, used in pagination
        $perPage = 12;
        // Requested offers
        $offers = Offer::when($location, function ($query, $location) {
                    return $query->where('location_id', '=', $location);
                })
                ->when($category, function ($query, $category) {
                    return $query->where('category_id', '=', $category);
                })
                ->paginate($perPage);
                
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
