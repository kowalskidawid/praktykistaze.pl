<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Image;
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
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'title' => 'required|string',
            'pinned' => 'required|bool',
            'content' => 'required|string'
        ]);
        $data = $request->all();
        $data['image'] = '';
        // Store data
        $article = Article::create($data);
        // After Offer created - store image if exists
        if ($request->image) {
            $image = $request->image;
            $img = Image::make($image);
            $img->fit(1024, 320)->encode('jpg');
            $imageName = md5(time());
            $imagePath = 'articles/' . $article->id . '/' . $imageName . '.jpg';
            Storage::disk('public')->put($imagePath, $img->encoded, 'public');
            $article->update(['image' => '/storage/'.$imagePath]);
        }

        return back();
    }
    // POST: Edit the article.
    public function update(Request $request, Article $article)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'title' => 'required|string',
            'pinned' => 'required|boolean',
            'content' => 'required|string'
        ]);
        $articleToUpdate = Article::findOrFail($article->id);
        if ($request->image) {
            $data = $request->all();
            $oldImage = $article->image;
            $image = $request->image;
            $img = Image::make($image);
            $img->fit(1024, 320)->encode('jpg');
            $imageName = md5(time());
            $imagePath = 'articles/' . $articleToUpdate->id . '/' . $imageName . '.jpg';
            Storage::disk('public')->put($imagePath, $img->encoded, 'public');
            Storage::disk('public')->delete($oldImage);
            $data['image'] = '/storage/'.$imagePath;
            $articleToUpdate->update($data);
        } else {
            $data = $request->except('image');
            $articleToUpdate->update($data);
        }

        return back();
    }
    // DELETE: Deletes the article.
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->back()->withSuccess('Article Deleted');
    }
}
