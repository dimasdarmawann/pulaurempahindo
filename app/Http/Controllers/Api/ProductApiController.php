<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    /**
     * GET /api/products
     * Tampilkan semua produk (support search & filter kategori).
     */
    public function index(Request $request)
    {
        $category = $request->query('category');
        $search   = $request->query('search');

        $products = Product::when($category, fn($q) => $q->where('category', $category))
            ->when($search, fn($q) => $q->where('name', 'like', "%$search%"))
            ->latest()
            ->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'Data produk berhasil diambil',
            'data'    => $products,
        ]);
    }

    /**
     * POST /api/products
     * Tambah produk baru (CREATE).
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|string|max:100',
            'origin'      => 'required|string|max:100',
            'volume'      => 'required|string|max:50',
            'abv'         => 'nullable|string|max:20',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|string',
            'featured'    => 'nullable|boolean',
        ]);

        $validated['image']    = $validated['image'] ?? 'products/default.jpg';
        $validated['featured'] = $request->boolean('featured');

        $product = Product::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil ditambahkan',
            'data'    => $product,
        ], 201);
    }

    /**
     * GET /api/products/{id}
     * Tampilkan detail satu produk (READ).
     */
    public function show($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail produk berhasil diambil',
            'data'    => $product,
        ]);
    }

    /**
     * PUT/PATCH /api/products/{id}
     * Update produk (UPDATE).
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan',
            ], 404);
        }

        $validated = $request->validate([
            'name'        => 'sometimes|required|string|max:255',
            'description' => 'sometimes|required|string',
            'category'    => 'sometimes|required|string|max:100',
            'origin'      => 'sometimes|required|string|max:100',
            'volume'      => 'sometimes|required|string|max:50',
            'abv'         => 'nullable|string|max:20',
            'price'       => 'sometimes|required|numeric|min:0',
            'image'       => 'nullable|string',
            'featured'    => 'nullable|boolean',
        ]);

        $product->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil diperbarui',
            'data'    => $product,
        ]);
    }

    /**
     * DELETE /api/products/{id}
     * Hapus produk (DELETE).
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return response()->json([
                'success' => false,
                'message' => 'Produk tidak ditemukan',
            ], 404);
        }

        $product->delete();

        return response()->json([
            'success' => true,
            'message' => 'Produk berhasil dihapus',
        ]);
    }
}
