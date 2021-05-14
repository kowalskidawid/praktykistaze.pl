<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Offer;
use App\Models\Application;

class ApplicationsController extends Controller
{
  // Add offer to applications
  public function store(Offer $offer) 
  {
      auth()->user()->student->applications()->attach($offer);

      return back();
  }
}
