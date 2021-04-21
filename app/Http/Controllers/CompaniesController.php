<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompaniesController extends Controller
{
    public function index(Request $request)
    {
        return view('companies.index');
    }
    // Display the specified resource.
    public function show(Company $company)
    {
        return view('companies.show', compact('company'));
    }
}
