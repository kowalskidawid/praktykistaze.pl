<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentsController extends Controller
{
    public function index(Request $request)
    {
        return view('students.index');
    }
    // Display the specified resource.
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }
}
