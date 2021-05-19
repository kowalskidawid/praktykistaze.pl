<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $data['image'] = '';
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
    // Delete the offer
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->back()->withSuccess('Offer Deleted');
    }
    // Upload image
    public function image(Request $request, Offer $offer)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);
        // Retrieve images
        $oldImage = $offer->image;
        $newImage = $request->image;
        // Generate data
        $name = md5(time());
        $path = 'offers/' . $offer->id . '/' . $name . '.jpg';
        // Upload file and update Offer
        Storage::disk('public')->put($path, file_get_contents($newImage), 'public');
        $offer->image = $path;
        $offer->save();
        Storage::disk('public')->delete($oldImage);

        return redirect()->back()->withSuccess('Offer updated');
    }
}
