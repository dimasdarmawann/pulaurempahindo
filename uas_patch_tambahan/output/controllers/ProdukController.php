<?php
// app/Http/Controllers/ProdukController.php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $produks = Produk::latest()->paginate(10);
        return view('admin.produk.index', compact('produks'));
    }

    public function create()
    {
        return view('admin.produk.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori'  => 'required|in:layanan,program',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('produk', 'public');
        }

        Produk::create([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori'  => $request->kategori,
            'gambar'    => $gambarPath,
            'is_active' => $request->boolean('is_active', true),
        ]);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk/Layanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('admin.produk.edit', compact('produk'));
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'nama'      => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'kategori'  => 'required|in:layanan,program',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_active' => 'nullable|boolean',
        ]);

        $gambarPath = $produk->gambar;
        if ($request->hasFile('gambar')) {
            if ($gambarPath && Storage::disk('public')->exists($gambarPath)) {
                Storage::disk('public')->delete($gambarPath);
            }
            $gambarPath = $request->file('gambar')->store('produk', 'public');
        }

        $produk->update([
            'nama'      => $request->nama,
            'deskripsi' => $request->deskripsi,
            'kategori'  => $request->kategori,
            'gambar'    => $gambarPath,
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('admin.produk.index')
            ->with('success', 'Produk/Layanan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);

        if ($produk->gambar && Storage::disk('public')->exists($produk->gambar)) {
            Storage::disk('public')->delete($produk->gambar);
        }

        $produk->delete();

        return redirect()->route('admin.produk.index')
            ->with('success', "Produk \"{$produk->nama}\" berhasil dihapus.");
    }

    public function toggle($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->update(['is_active' => !$produk->is_active]);

        $status = $produk->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.produk.index')
            ->with('success', "Produk \"{$produk->nama}\" berhasil {$status}.");
    }
}
