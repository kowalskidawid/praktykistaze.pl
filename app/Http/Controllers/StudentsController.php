<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Location;

class StudentsController extends Controller
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
        $students = Student::when($location, function ($query, $location) {
                    return $query->where('location_id', '=', $location);
                })
                ->paginate($perPage);
                
        return view('students.index', compact('students', 'locations'));
    }
    // Display the specified resource.
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}
