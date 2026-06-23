<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductAdminController extends Controller
{
    /**
     * Tampilkan semua produk untuk admin.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        $products = Product::when($search, fn($q) => $q->where('name', 'like', "%$search%"))
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('admin.products.index', compact('products', 'search'));
    }

    /**
     * Form tambah produk baru.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Simpan produk baru ke database (CREATE).
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
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'featured'    => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images'), $filename);
            $validated['image'] = $filename;
        } else {
            $validated['image'] = 'default.jpg';
        }

        $validated['featured'] = $request->boolean('featured');

        Product::create($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    /**
     * Form edit produk.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update produk ke database (UPDATE).
     */
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|string|max:100',
            'origin'      => 'required|string|max:100',
            'volume'      => 'required|string|max:50',
            'abv'         => 'nullable|string|max:20',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'featured'    => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($product->image && $product->image !== 'default.jpg' && file_exists(public_path('assets/images/' . $product->image))) {
                @unlink(public_path('assets/images/' . $product->image));
            }
            $file     = $request->file('image');
            $filename = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '_' . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('assets/images'), $filename);
            $validated['image'] = $filename;
        }

        $validated['featured'] = $request->boolean('featured');

        $product->update($validated);

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    /**
     * Hapus produk (DELETE).
     */
    public function destroy(Product $product)
    {
        if ($product->image && $product->image !== 'default.jpg' && file_exists(public_path('assets/images/' . $product->image))) {
            @unlink(public_path('assets/images/' . $product->image));
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Produk berhasil dihapus!');
    }

    /**
     * Export PDF: daftar semua produk (laporan/katalog).
     */
    public function exportPdf()
    {
        $products = Product::orderBy('category')->orderBy('name')->get();

        $pdf = Pdf::loadView('admin.products.pdf-list', compact('products'))
            ->setPaper('a4', 'landscape');

        return $pdf->download('laporan-produk-pulau-rempah-' . now()->format('Y-m-d') . '.pdf');
    }

    /**
     * Export PDF: detail satu produk (invoice/lembar detail).
     */
    public function exportPdfDetail(Product $product)
    {
        $pdf = Pdf::loadView('admin.products.pdf-detail', compact('product'))
            ->setPaper('a4', 'portrait');

        return $pdf->download('detail-' . str($product->name)->slug() . '.pdf');
    }
}
