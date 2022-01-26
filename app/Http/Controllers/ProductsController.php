<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return view('products.products', compact('products'));
    }

    public function show($id)
    {
        $products = Product::findOrFail($id);

        return view('products.show-products', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create-product', compact('categories'));
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit-product', compact('products', 'categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'nullable',
            'cost_price' => 'numeric',
            'price' => 'numeric',
        ]);

        $products = new Product();

        $products->title = $request->title;
        $products->category_id = $request->category_id;
        $products->description = $request->description;
        $products->cost_price= $request->cost_price;
        $products->price= $request->price;

        $products->save();

        return redirect()->route('products.index')->with('message', 'Product created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'category_id' => 'required',
            'description' => 'nullable',
            'cost_price' => 'nullable',
            'price' => 'nullable',
        ]);

        $products = Product::findOrFail($id);

        $products->title = $request->title;
        $products->category_id = $request->category_id;
        $products->description = $request->description;
        $products->cost_price= $request->cost_price;
        $products->price= $request->price;

        $products->save();

        return redirect()->route('products.index')->with('message', 'Product updated successfully');
    }

    public function destroy($id)
    {
        $products = Product::findOrFail($id);

        $products->delete();

        return redirect()->route('products.index')->with('message', 'Product deleted successfully');
    }
}
