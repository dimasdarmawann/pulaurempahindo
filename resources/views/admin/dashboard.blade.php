@extends('layouts.app')
@section('title', 'Dashboard Admin — Pulau Rempah')

@section('content')
<div style="background: linear-gradient(135deg, #1a3a2a, #2d6a4f); padding:50px 0; color:#fff;">
    <div class="container">
        <p style="color:#c9a84c; font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:.85rem; margin-bottom:8px;">Panel Admin</p>
        <h2 style="font-family:'Playfair Display',serif; font-size:2.2rem;">Dashboard</h2>
    </div>
</div>

<div class="container my-5">
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card border-0 rounded-4 shadow-sm p-4 h-100">
                <i class="bi bi-box-seam fs-1" style="color:#2d6a4f;"></i>
                <h5 class="fw-bold mt-3" style="color:#1a3a2a;">{{ \App\Models\Product::count() }} Produk</h5>
                <p class="text-muted small mb-3">Total produk yang terdaftar di katalog.</p>
                <a href="{{ route('admin.products.index') }}" class="btn btn-primary-pr btn-sm align-self-start">Kelola Produk</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 rounded-4 shadow-sm p-4 h-100">
                <i class="bi bi-envelope fs-1" style="color:#2d6a4f;"></i>
                <h5 class="fw-bold mt-3" style="color:#1a3a2a;">{{ \App\Models\Contact::count() }} Pesan</h5>
                <p class="text-muted small mb-3">Pesan masuk dari halaman kontak.</p>
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-primary-pr btn-sm align-self-start">Lihat Pesan</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 rounded-4 shadow-sm p-4 h-100">
                <i class="bi bi-newspaper fs-1" style="color:#2d6a4f;"></i>
                <h5 class="fw-bold mt-3" style="color:#1a3a2a;">{{ \App\Models\Artikel::count() }} Artikel</h5>
                <p class="text-muted small mb-3">Total artikel yang tersimpan.</p>
                <a href="{{ route('admin.artikel.index') }}" class="btn btn-primary-pr btn-sm align-self-start">Kelola Artikel</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 rounded-4 shadow-sm p-4 h-100">
                <i class="bi bi-file-earmark-pdf fs-1" style="color:#2d6a4f;"></i>
                <h5 class="fw-bold mt-3" style="color:#1a3a2a;">Laporan PDF</h5>
                <p class="text-muted small mb-3">Unduh laporan produk dalam format PDF.</p>
                <a href="{{ route('admin.products.export.pdf') }}" class="btn btn-outline-pr btn-sm align-self-start">Export PDF</a>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 rounded-4 shadow-sm p-4 h-100">
                <i class="bi bi-lightning-charge fs-1" style="color:#2d6a4f;"></i>
                <h5 class="fw-bold mt-3" style="color:#1a3a2a;">CRUD AJAX</h5>
                <p class="text-muted small mb-3">Kelola produk via REST API tanpa reload halaman.</p>
                <a href="{{ route('admin.products.ajax') }}" class="btn btn-outline-pr btn-sm align-self-start">Buka CRUD AJAX</a>
            </div>
        </div>

    </div>
</div>
@endsection