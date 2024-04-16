<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();

        return view('management.product', compact('product'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view('management.product', compact('product'));
    }
}
