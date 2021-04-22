<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Category;
use App\Models\Location;

class CompaniesController extends Controller
{
    public function index(Request $request)
    {
        // List of values for select inputs in form
        $locations = Location::get();
        // Requested values for filtering the results
        $location = $request->location;
        // Number of items per page, used in pagination
        $perPage = 12;
        // Requested companies
        $companies = Company::when($location, function ($query, $location) {
                    return $query->where('location_id', '=', $location);
                })
                ->paginate($perPage);
                
        return view('companies.index', compact('companies', 'locations'));
    }
    // Display the specified resource.
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }
}
