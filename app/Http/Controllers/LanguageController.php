<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function store($language)
    {
        \Session::put('locale', $language);
        return redirect()->back();
    }
}
