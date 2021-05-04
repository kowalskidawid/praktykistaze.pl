<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Location;
use App\Models\Category;
use App\Models\Type;

class OfferController extends Controller
{
    // Returns view for all company offers
    public function index()
    {
        $offers = auth()->user()->company->offers->reverse();

        return view('company.offers.index', compact('offers'));
    }
    // Returns view for creating new offer
    public function create()
    {
        $locations = Location::get();
        $categories = Category::get();
        $types = Type::get();

        return view('company.offers.create', compact('locations', 'categories', 'types'));
    }
    // POST request to create new offer
    public function store(Request $request)
    {
        $this->validate($request, [
            "position" => 'required|string|max:255',
            "city" => 'required|string|max:255',
            "location" => 'required|exists:locations,id',
            "category" => 'required|exists:categories,id',
            "type" => 'required|exists:types,id',
            "job_duration" => '',
            "job_start" => '',
            "salary" => '',
            "vacancies" => '',
            "description" => '',
            "offer_duration" => '',
        ]);

        $offer = new Offer;
        $offer->company_id = auth()->user()->company->id;
        $offer->position = $request->position;
        $offer->city = $request->city;
        $offer->location_id = $request->location;
        $offer->category_id = $request->category;
        $offer->type_id = $request->type;
        $offer->job_duration = $request->job_duration;
        $offer->job_start = $request->job_start;
        $offer->salary = $request->salary;
        $offer->vacancies = $request->vacancies;
        $offer->description = $request->description;
        $offer->offer_duration = $request->offer_duration;
        // 
        $offer->image = "/images/offer.jpg";
        // 
        $offer->save();

        return redirect()->back()->withSuccess('Offer created');
    }
    // Returns view for editing the offer
    public function edit($id)
    {
        $offer = auth()->user()->company->offers()->findOrFail($id);
        $locations = Location::get();
        $categories = Category::get();
        $types = Type::get();

        return view('company.offers.edit', compact('offer', 'locations', 'categories', 'types'));
    }
    // POST request to update the offer
    public function update(Request $request, $id)
    {
        $offer = auth()->user()->company->offers()->findOrFail($id);

        $this->validate($request, [
            "position" => 'required|string|max:255',
            "city" => 'required|string|max:255',
            "location" => 'required|exists:locations,id',
            "category" => 'required|exists:categories,id',
            "type" => 'required|exists:types,id',
            "job_duration" => '',
            "job_start" => '',
            "salary" => '',
            "vacancies" => '',
            "description" => '',
            "offer_duration" => '',
        ]);

        $offer->update([
            "position" => $request->position,
            "city" => $request->city,
            "location_id" => $request->location,
            "category_id" => $request->category,
            "type_id" => $request->type,
            "job_duration" => $request->job_duration,
            "job_start" => $request->job_start,
            "salary" => $request->salary,
            "vacancies" => $request->vacancies,
            "description" => $request->description,
            "offer_duration" => $request->offer_duration,
        ]);

        return redirect()->back()->withSuccess('Offer updated');
    }
    // Post request to store or update offer image
    public function image(Request $request, $id)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        // TODO

        return redirect()->back()->withSuccess('Offer updated');
    }
}
