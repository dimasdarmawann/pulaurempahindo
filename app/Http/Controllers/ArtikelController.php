<?php
// app/Http/Controllers/ArtikelController.php

namespace App\Http\Controllers;

use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::latest()->paginate(10);
        return view('admin.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'        => 'required|string|max:255',
            'konten'       => 'required|string',
            'penulis'      => 'required|string|max:100',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        Artikel::create([
            'judul'        => $request->judul,
            'slug'         => Artikel::generateSlug($request->judul),
            'konten'       => $request->konten,
            'penulis'      => $request->penulis,
            'gambar'       => $gambarPath,
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan.');
    }

    public function show($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.show', compact('artikel'));
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul'        => 'required|string|max:255',
            'konten'       => 'required|string',
            'penulis'      => 'required|string|max:100',
            'gambar'       => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_published' => 'nullable|boolean',
        ]);

        $gambarPath = $artikel->gambar;
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($gambarPath && Storage::disk('public')->exists($gambarPath)) {
                Storage::disk('public')->delete($gambarPath);
            }
            $gambarPath = $request->file('gambar')->store('artikel', 'public');
        }

        // Update slug hanya jika judul berubah
        $slug = $artikel->slug;
        if ($artikel->judul !== $request->judul) {
            $slug = Artikel::generateSlug($request->judul);
        }

        $artikel->update([
            'judul'        => $request->judul,
            'slug'         => $slug,
            'konten'       => $request->konten,
            'penulis'      => $request->penulis,
            'gambar'       => $gambarPath,
            'is_published' => $request->boolean('is_published'),
        ]);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        // Hapus gambar jika ada
        if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
            Storage::disk('public')->delete($artikel->gambar);
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')
            ->with('success', "Artikel \"{$artikel->judul}\" berhasil dihapus.");
    }

    public function togglePublish($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->update(['is_published' => !$artikel->is_published]);

        $status = $artikel->is_published ? 'dipublikasikan' : 'disembunyikan';
        return redirect()->route('admin.artikel.index')
            ->with('success', "Artikel \"{$artikel->judul}\" berhasil {$status}.");
    }
}
