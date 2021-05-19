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
    // Add new offer.
    public function store(Request $request)
    {
        $request->validate([
            'position' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'city' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'type_id' => 'required|exists:types,id',
            'offer_duration' => 'required|integer',
            'job_start' => 'date|nullable',
            'job_duration' => 'integer|nullable',
            'salary' => 'nullable|integer',
            'vacancies' => 'integer|nullable',
            'description' => 'required|string'
        ]);
        $data = $request->all();
        $data['image'] = '/images/offer.jpg';
        $company = auth()->user()->company;
        $company->offers()->create($data);

        return redirect()->route('dashboard.offers')->withSuccess('Offer Created');
    }
    // Update an offer.
    public function update(Request $request, Offer $offer)
    {
        $request->validate([
            'position' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'city' => 'required|string',
            'location_id' => 'required|exists:locations,id',
            'type_id' => 'required|exists:types,id',
            'offer_duration' => 'required|integer',
            'job_start' => 'date|nullable',
            'job_duration' => 'integer|nullable',
            'salary' => 'nullable|integer',
            'vacancies' => 'integer|nullable',
            'description' => 'required|string'
        ]);
        $data = $request->all();
        $company = auth()->user()->company;
        $offerToUpdate = $company->offers()->findOrFail($offer->id);
        $offerToUpdate->update($data);

        return redirect()->route('dashboard.offers')->withSuccess('Offer Updated');
    }
}
