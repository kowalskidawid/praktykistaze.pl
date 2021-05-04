<?php

namespace App\Http\Controllers\company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    // Settings
    public function settings()
    {
        return view('company.settings');
    }
    // 
    public function profile(Request $request)
    {
        $this->validate($request, [
            "company_name" => 'required|string|max:50'
        ]);
        auth()->user()->company->update($request->all());
        return redirect()->back()->withSuccess('Profile updated');
    }
}
