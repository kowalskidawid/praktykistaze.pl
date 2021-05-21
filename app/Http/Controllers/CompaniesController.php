<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Category;
use App\Models\Location;
use App\Models\Size;
use App\Models\Offer;

class CompaniesController extends Controller
{
    public function index(Request $request)
    {
        // List of values for select inputs in form
        $locations = Location::get();
        $categories = Category::get();
        $sizes = Size::get();
        // Requested values for filtering the results
        $name = $request->name;
        $category = $request->category;
        $city = $request->city;
        $location = $request->location;
        $size = $request->size;
        // Number of items per page, used in pagination
        $perPage = 12;
        // Requested companies
        $companies = Company::when($name, function ($query, $name) {
                    return $query->where('company_name', 'LIKE', '%'.$name.'%');
                })
                ->when($category, function ($query, $category) {
                    return $query->where('category_id', 'LIKE', $category);
                })
                ->when($city, function ($query, $city) {
                    return $query->where('city', 'LIKE', '%'.$city.'%');
                })
                ->when($location, function ($query, $location) {
                    return $query->where('location_id', '=', $location);
                })
                ->when($size, function ($query, $size) {
                    return $query->where('size_id', 'LIKE', $size);
                })
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
                
        return view('companies.index', compact('companies', 'locations', 'categories', 'sizes'));
    }
    // Display the specified resource.
    public function show(Company $company)
    {
        $offers = $company->offers()->latest()->take(3)->get();

        return view('companies.show', compact('company', 'offers'));
    }
}
