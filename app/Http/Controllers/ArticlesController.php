<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticlesController extends Controller
{
    // GET: Displays a page filled with articles
    public function index(Request $request)
    {
        $articles = Article::all()->reverse();
        return view('articles.index', compact('articles'));
    }
    // GET: Display the specified resource.
    public function show(Article $article)
    {
        $articles = Article::latest()->take(5)->get();
        return view('articles.show', compact('article', 'articles'));
    }
    // GET: Display the article creation page.
    public function create()
    {
        return view('articles.create');
    }
    // POST: Store the new article.
    public function store()
    {
        
    }
    // GET: Display the article edit page.
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }
    // POST: Edit the article.
    public function update(Article $article)
    {
        
    }
    // DELETE: Deletes the article.
    public function destroy(Article $article)
    {

    }
}
