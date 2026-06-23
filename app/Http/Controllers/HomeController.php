<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $featured   = Product::where('featured', true)->limit(4)->get();
        $categories = Product::select('category')->distinct()->pluck('category');
        $total      = Product::count();

        return view('home.index', compact('featured', 'categories', 'total'));
    }
}
