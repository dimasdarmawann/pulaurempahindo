<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');
        $search   = $request->query('search');

        $products = Product::when($category, fn($q) => $q->where('category', $category))
            ->when($search, fn($q) => $q->where('name', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%"))
            ->paginate(6);

        $categories = Product::select('category')->distinct()->pluck('category');

        return view('products.index', compact('products', 'categories', 'category'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $related = Product::where('category', $product->category)
            ->where('id', '!=', $product->id)
            ->limit(3)->get();

        return view('products.show', compact('product', 'related'));
    }
}
