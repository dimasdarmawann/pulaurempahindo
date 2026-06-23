@extends('layouts.app')
@section('title', 'Produk — Pulau Rempah')

@section('content')
<div style="background: linear-gradient(135deg, #1a3a2a, #2d6a4f); padding:50px 0; color:#fff;">
    <div class="container">
        <p style="color:#c9a84c; font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:.85rem; margin-bottom:8px;">Koleksi Kami</p>
        <h2 style="font-family:'Playfair Display',serif; font-size:2.4rem;">Semua Produk</h2>
        <nav><ol class="breadcrumb mb-0">
            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#c9a84c;">Beranda</a></li>
            <li class="breadcrumb-item active" style="color:rgba(255,255,255,.7);">Produk</li>
        </ol></nav>
    </div>
</div>

<div class="container my-5">
    <div class="row g-4">

        {{-- SIDEBAR --}}
        <div class="col-lg-3">
            <div class="card border-0 rounded-3 shadow-sm p-4" style="background:#fff; position:sticky; top:90px;">
                <h6 class="fw-bold mb-3" style="color:#1a3a2a; font-family:'Playfair Display',serif;">Filter Produk</h6>
                <form action="{{ route('products.index') }}" method="GET">
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-semibold">Cari Produk</label>
                        <input type="text" name="search" class="form-control form-control-sm rounded-pill"
                               placeholder="Nama produk..." value="{{ request('search') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-muted small fw-semibold">Kategori</label>
                        <div class="d-flex flex-column gap-2">
                            <a href="{{ route('products.index') }}"
                               class="btn btn-sm rounded-pill text-start {{ !request('category') ? 'btn-success' : 'btn-outline-secondary' }}"
                               style="{{ !request('category') ? 'background:#2d6a4f; border-color:#2d6a4f;' : '' }}">
                                🍸 Semua
                            </a>
                            @foreach(['Gin','Vodka','Rum','Soju','Whisky','Cold Brew'] as $cat)
                            <a href="{{ route('products.index', ['category' => $cat]) }}"
                               class="btn btn-sm rounded-pill text-start {{ request('category') == $cat ? 'btn-success' : 'btn-outline-secondary' }}"
                               style="{{ request('category') == $cat ? 'background:#2d6a4f; border-color:#2d6a4f;' : '' }}">
                                {{ $cat }}
                            </a>
                            @endforeach
                        </div>
                    </div>
                    <button type="submit" class="btn-primary-pr btn w-100 btn-sm">
                        <i class="bi bi-search me-1"></i> Cari
                    </button>
                    @if(request('search') || request('category'))
                    <a href="{{ route('products.index') }}" class="btn btn-outline-secondary w-100 btn-sm mt-2 rounded-pill">
                        Reset Filter
                    </a>
                    @endif
                </form>
            </div>
        </div>

        {{-- GRID --}}
        <div class="col-lg-9">
            <p class="text-muted mb-4 small">
                Menampilkan <strong>{{ $products->count() }}</strong> produk
                @if(request('category')) kategori <strong>"{{ request('category') }}"</strong>@endif
            </p>

            @if($products->count() > 0)
            <div class="row g-4">
                @foreach($products as $product)
                <div class="col-sm-6 col-xl-4">
                    <div class="card product-card">
                        <div class="card-img-wrap">
                            @if($product->featured)
                            <span class="badge-featured">⭐ Unggulan</span>
                            @endif
                            <img src="{{ asset('assets/images/' . $product->image) }}"
                                 alt="{{ $product->name }}"
                                 onerror="this.src='https://via.placeholder.com/400x240/2d6a4f/ffffff?text=Pulau+Rempah'">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <span class="badge-category mb-2">{{ $product->category }}</span>
                            <h6 class="fw-bold" style="font-family:'Playfair Display',serif; color:#1a3a2a;">
                                {{ $product->name }}
                            </h6>
                            <p class="text-muted small flex-grow-1 mb-2">
                                {{ Str::limit($product->description, 80) }}
                            </p>
                            <div class="d-flex gap-2 mb-3" style="font-size:.78rem;">
                                <span class="badge bg-light text-dark">{{ $product->volume }}</span>
                                @if($product->abv)
                                <span class="badge bg-light text-dark">{{ $product->abv }} ABV</span>
                                @endif
                                <span class="badge bg-light text-dark">
                                    <i class="bi bi-geo-alt"></i> {{ $product->origin }}
                                </span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center">
                                <span class="price-tag">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                                <a href="{{ route('products.show', $product->id) }}" class="btn-primary-pr btn btn-sm">
                                    Detail
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $products->appends(request()->query())->links('pagination::bootstrap-5') }}
            </div>

            @else
            <div class="text-center py-5">
                <div style="font-size:4rem;">🔍</div>
                <h5 class="mt-3" style="color:#1a3a2a;">Produk tidak ditemukan</h5>
                <p class="text-muted">Coba kata kunci atau filter lain</p>
                <a href="{{ route('products.index') }}" class="btn-primary-pr btn mt-2">Lihat Semua</a>
            </div>
            @endif
        </div>

    </div>
</div>
@endsection