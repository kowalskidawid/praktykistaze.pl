<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Favourite;

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
        $applications = auth()->user()->student->applications;

        return view('student.applications', compact('applications'));
    }
    // Favourites
    public function favourites()
    {
        $favourites = auth()->user()->student->favourites;

        return view('student.favourites', compact('favourites'));
    }
}
