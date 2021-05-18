<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }
    // Settings page
    public function settings()
    {
        return view('dashboard.settings');
    }
    public function email(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8'
        ]);
        $user = auth()->user();
        if (Hash::check($request->password, $user->password)) {
            $user->update(['email'=> $request->email]);
        }
        return back();
    }
    public function password(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:8',
            'passwordNew' => 'required|string|min:8',
            'passwordConfirmed' => 'required|string|min:8',
        ]);
        $user = auth()->user();
        if (Hash::check($request->password, $user->password) && $request->passwordNew === $request->passwordConfirmed) {
            $user->update(['password'=> Hash::make($request->passwordNew)]);
        }
        return back();
    }
    // Profile page
    public function profile()
    {
        return view('dashboard.profile');
    }
    public function student(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string',
            'last_name' => 'required|string',
        ]);
        $user = auth()->user();
        $user->student->update($request->all());
        return back();
    }
    public function company(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string'
        ]);
        $user = auth()->user();
        $user->company->update($request->all());
        return back();
    }
    // Favourites page
    public function favourites()
    {
        $student = auth()->user()->student;
        $favourites = $student->favourites;
        return view('dashboard.favourites', compact('favourites'));
    }
    // Applications page
    public function applications()
    {
        $student = auth()->user()->student;
        $applications = $student->applications;
        return view('dashboard.applications', compact('applications'));
    }
    // Offers page
    public function offers()
    {
        $company = auth()->user()->company;
        $offers = $company->offers->reverse();
        return view('dashboard.offers', compact('offers'));
    }
}
