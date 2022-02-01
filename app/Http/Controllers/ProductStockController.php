<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductStockController extends Controller
{
    public function index() {
        $products = Product::all();

        return view('products.products-stock', compact('products'));
    }
}
