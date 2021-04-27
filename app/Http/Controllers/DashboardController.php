<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    // Student routes
    public function favourites()
    {
        return view('dashboard.favourites');
    }

    // Company routes
}
