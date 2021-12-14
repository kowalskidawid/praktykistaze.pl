<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::all()->sortBy('name');
        return view('dashboard/categories/index')
            ->with('categories', $categories);
    }

    public function delete(Category $category)
    {
        $category->delete();
        return redirect()->back()->withSuccess('Category Deleted');
    }

    public function edit(Category $category)
    {
        return view('dashboard/categories/edit')
            ->with('category', $category);
    }

    public function update(Category $category, Request $request)
    {
        $category->update([
            'name' => $request->input('name')
        ]);
        return redirect()->route('dashboard.categories.index')->withSuccess('Category Updated');
    }
}
