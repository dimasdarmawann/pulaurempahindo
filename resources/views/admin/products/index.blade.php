@extends('layouts.app')
@section('title', 'Kelola Produk — Admin')

@section('content')
<div style="background: linear-gradient(135deg, #1a3a2a, #2d6a4f); padding:50px 0; color:#fff;">
    <div class="container">
        <p style="color:#c9a84c; font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:.85rem; margin-bottom:8px;">Panel Admin</p>
        <h2 style="font-family:'Playfair Display',serif; font-size:2.2rem;">Kelola Produk</h2>
    </div>
</div>

<div class="container my-5">

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
        <form action="{{ route('admin.products.index') }}" method="GET" class="d-flex gap-2">
            <input type="text" name="search" class="form-control rounded-pill" placeholder="Cari produk..."
                   value="{{ $search }}" style="min-width:250px;">
            <button class="btn btn-outline-pr">Cari</button>
        </form>

        <div class="d-flex gap-2">
            <a href="{{ route('admin.products.export.pdf') }}" class="btn btn-outline-pr">
                <i class="bi bi-file-earmark-pdf"></i> Export PDF
            </a>
            <a href="{{ route('admin.products.create') }}" class="btn btn-primary-pr">
                <i class="bi bi-plus-lg"></i> Tambah Produk
            </a>
        </div>
    </div>

    <div class="card border-0 rounded-4 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead style="background:#f0ead9;">
                        <tr>
                            <th>Gambar</th>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Unggulan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($products as $product)
                        <tr>
                            <td>
                                <div style="position:relative; width:56px; height:56px; cursor:pointer;"
                                     data-bs-toggle="modal" data-bs-target="#previewModal"
                                     onclick="document.getElementById('previewImg').src=this.querySelector('img').src; document.getElementById('previewTitle').innerText='{{ addslashes($product->name) }}';">
                                    <img src="{{ asset('assets/images/' . $product->image) }}" alt="{{ $product->name }}"
                                         style="width:56px; height:56px; object-fit:cover; border-radius:8px;">
                                    <span style="position:absolute; bottom:-4px; right:-4px; background:#1a3a2a; color:#c9a84c; width:20px; height:20px; border-radius:50%; display:flex; align-items:center; justify-content:center; font-size:11px; border:2px solid #fff;">
                                        <i class="bi bi-eye-fill"></i>
                                    </span>
                                </div>
                            </td>
                            <td class="fw-semibold">{{ $product->name }}</td>
                            <td><span class="badge-category">{{ $product->category }}</span></td>
                            <td>Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                            <td>
                                @if ($product->featured)
                                    <span class="badge bg-warning text-dark">Ya</span>
                                @else
                                    <span class="badge bg-secondary">Tidak</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('admin.products.export.pdf.detail', $product->id) }}"
                                       class="btn btn-sm btn-outline-secondary" title="Download PDF">
                                        <i class="bi bi-file-earmark-pdf"></i>
                                    </a>
                                    <a href="{{ route('admin.products.edit', $product->id) }}"
                                       class="btn btn-sm btn-warning text-white">Edit</a>
                                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted py-4">Belum ada produk.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $products->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </div>
</div>

<!-- MODAL PREVIEW GAMBAR -->
<div class="modal fade" id="previewModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0">
            <div class="modal-header" style="background:#1a3a2a; color:#fff;">
                <h6 class="modal-title" id="previewTitle">Preview Produk</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center p-0">
                <img id="previewImg" src="" alt="Preview" style="width:100%; max-height:480px; object-fit:contain; background:#f8f4e8;">
            </div>
        </div>
    </div>
</div>
@endsection