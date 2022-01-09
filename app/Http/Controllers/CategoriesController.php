<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')->get();

        return view('Categories.categories', compact('categories'));
    }

    public function create()
    {
        return view('Categories.create-categories');
    }

    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return view('Categories.edit-categories', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $categories = new Category();

        $categories->title = $request->title;

        $categories->save();

        return redirect()->route('categories.index')->with('message', 'Category created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $categories = Category::findOrFail($id);

        $categories->title = $request->title;

        $categories->save();

        return redirect()->route('categories.index')->with('message', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $categories = Category::findOrFail($id);

        $categories->delete();

        return redirect()->route('categories.index')->with('message', 'Category deleted successfully');
    }

}
