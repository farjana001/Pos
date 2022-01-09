<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class productsController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();

        return view('products.products', compact('products'));
    }

    public function create()
    {
        return view('products.create-products');
    }

    public function edit($id)
    {
        $products = Product::findOrFail($id);
        return view('products.edit-products', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $products = new Product();

        $products->title = $request->title;

        $products->save();

        return redirect()->route('products.index')->with('message', 'Product created successfully');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $products = Product::findOrFail($id);

        $products->title = $request->title;

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
