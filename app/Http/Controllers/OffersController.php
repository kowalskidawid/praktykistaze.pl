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
        $position = $request->position;
        $city = $request->city;
        $salary = $request->salary;
        // Number of items per page, used in pagination
        $perPage = 12;
        // Requested offers
        $offers = Offer::when($location, function ($query, $location) {
                    return $query->where('location_id', '=', $location);
                })
                ->when($category, function ($query, $category) {
                    return $query->where('category_id', '=', $category);
                })
                ->when($city, function ($query, $city) {
                    return $query->where('city', 'LIKE', '%'.$city.'%');
                })
                ->when($position, function ($query, $position) {
                    return $query->where('position', 'LIKE', '%'.$position.'%');
                })
                ->when($salary, function ($query, $salary) {
                    return $query->where('salary', '>', 0);
                })
                ->paginate($perPage);
                
        return view('offers.index', compact('offers', 'locations', 'categories'));
    }
    // Display the specified resource.
    public function show(Offer $offer)
    {
        return view('offers.show', compact('offer'));
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
