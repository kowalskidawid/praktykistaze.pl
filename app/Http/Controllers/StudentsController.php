<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Location;
use App\Models\Category;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        // List of values for select inputs in form
        $locations = Location::get();
        $categories = Category::get();
        // Requested values for filtering the results
        $city = $request->city;
        $location = $request->location;
        $category = $request->category;
        $education = $request->education;
        // Number of items per page, used in pagination
        $perPage = 12;
        // Requested companies
        $students = Student::when($city, function ($query, $city) {
                    return $query->where('city', '=', '%'.$city.'%');
                })
                ->when($location, function ($query, $location) {
                    return $query->where('location_id', '=', $location);
                })
                ->when($category, function ($query, $category) {
                    return $query->where('category_id', '=', $category);
                })
                ->when($education, function ($query, $education) {
                    return $query->where('education', '=', '%'.$education.'%');
                })
                ->orderBy('created_at', 'desc')
                ->paginate($perPage);
                
        return view('students.index', compact('students', 'locations', 'categories'));
    }
    // Display the specified resource.
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}
