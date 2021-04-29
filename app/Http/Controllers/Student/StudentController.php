<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Favourite;
use App\Models\Offer;

class StudentController extends Controller
{
    // Settings
    public function settings()
    {
        return view('student.settings');
    }
    public function profile(Request $request)
    {
        $this->validate($request, [
            "first_name" => 'required|string|max:50',
            "last_name" => 'required|string|max:50'
        ]);
        auth()->user()->student->update($request->all());
        return redirect()->back()->withSuccess('Profile updated');
    }
    // Applications
    public function applications()
    {
        $applications = auth()->user()->student->applications->reverse();

        return view('student.applications', compact('applications'));
    }
    // 
    public function apply(Offer $offer) 
    {
        auth()->user()->student->applications()->attach($offer);

        return back();
    }
    // Favourites
    public function favourites()
    {
        $favourites = auth()->user()->student->favourites->reverse();

        return view('student.favourites', compact('favourites'));
    }

    // 
    public function favouriteOffer(Offer $offer) 
    {
        auth()->user()->student->favourites()->attach($offer);

        return back();
    }

    // 
    public function unfavouriteOffer(Offer $offer) 
    {
        // $student = auth()->user()->student;
        // dd($student->favourites);
        auth()->user()->student->favourites()->detach($offer);

        return back();
    }
}
