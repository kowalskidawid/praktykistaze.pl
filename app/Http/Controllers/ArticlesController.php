<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Article;

class ArticlesController extends Controller
{
    public function index(Request $request)
    {
        return view('articles.index');
    }
    // Display the specified resource.
    // public function show(Article $article)
    // {
    //     return view('articles.show', compact('article'));
    // }
    public function show()
    {
        return view('articles.show');
    }
}
