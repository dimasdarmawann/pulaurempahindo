@extends('layouts.app')
@section('title', $product->name . ' — Pulau Rempah')

@section('styles')
<style>
    .detail-img { width:100%; max-height:480px; object-fit:cover; border-radius:20px; box-shadow:0 12px 40px rgba(0,0,0,.15); }
    .spec-item { display:flex; justify-content:space-between; padding:12px 0; border-bottom:1px solid #f0ede0; font-size:.92rem; }
    .spec-label { color:#888; font-weight:500; }
    .spec-value { color:#1a3a2a; font-weight:600; }
    .quote-box { background: linear-gradient(135deg, #1a3a2a, #2d6a4f); border-radius:16px; padding:30px; color:#fff; position:relative; overflow:hidden; }
    .quote-box::before { content:'"'; position:absolute; top:-20px; left:20px; font-size:120px; color:rgba(201,168,76,.2); font-family:'Playfair Display',serif; }
    .quote-text { font-family:'Playfair Display',serif; font-size:1.2rem; font-style:italic; line-height:1.8; position:relative; z-index:1; }
    .taste-badge { background:#e8f5e9; color:#2d6a4f; border-radius:50px; padding:6px 16px; font-size:.82rem; font-weight:600; display:inline-block; margin:4px; }
</style>
@endsection

@section('content')
<div class="container my-5">

    {{-- BREADCRUMB --}}
    <nav class="mb-4"><ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#2d6a4f;">Beranda</a></li>
        <li class="breadcrumb-item"><a href="{{ route('products.index') }}" style="color:#2d6a4f;">Produk</a></li>
        <li class="breadcrumb-item active text-muted">{{ $product->name }}</li>
    </ol></nav>

    <div class="row g-5 align-items-start">

        {{-- GAMBAR --}}
        <div class="col-lg-5">
            <img src="{{ asset('assets/images/' . $product->image) }}"
                 alt="{{ $product->name }}" class="detail-img"
                 onerror="this.src='https://via.placeholder.com/600x480/2d6a4f/ffffff?text=Pulau+Rempah'">
            @if($product->featured)
            <div class="mt-3 text-center">
                <span style="background:#c9a84c; color:#1a3a2a; padding:6px 20px; border-radius:50px; font-size:.85rem; font-weight:700;">
                    ⭐ Produk Unggulan
                </span>
            </div>
            @endif
        </div>

        {{-- DETAIL --}}
        <div class="col-lg-7">
            <span class="badge-category mb-3 d-inline-block">{{ $product->category }}</span>
            <h1 style="font-family:'Playfair Display',serif; color:#1a3a2a; font-size:2.2rem;">
                {{ $product->name }}
            </h1>

            {{-- KALIMAT PRODUK / QUOTE --}}
            <div class="quote-box my-4">
                <p class="quote-text mb-0">
                    @switch($product->category)
                        @case('Gin')
                            "Setiap tegukan membawa kamu dalam perjalanan melintasi kepulauan Indonesia yang kaya akan rempah dan botanicals tropis yang memukau."
                            @break
                        @case('Vodka')
                            "Kemurnian yang tak tertandingi — dibuat untuk mereka yang menghargai kesempurnaan dalam setiap tetes minuman premium."
                            @break
                        @case('Rum')
                            "Warisan lebih dari satu abad pembuatan rum terbaik dunia, kini hadir untuk menemani momen spesialmu."
                            @break
                        @case('Soju')
                            "Tradisi Korea yang telah bertahan berabad-abad, menghadirkan kebersamaan dan kehangatan dalam setiap momen."
                            @break
                        @case('Whisky')
                            "Kemewahan yang dapat dinikmati semua orang — karena pengalaman terbaik tidak harus selalu rumit."
                            @break
                        @case('Cold Brew')
                            "Kekayaan kopi Nusantara dalam setiap tegukan — diproses dengan sabar untuk menghasilkan yang terbaik."
                            @break
                        @default
                            "Kualitas premium yang lahir dari kecintaan terhadap tradisi dan inovasi tanpa batas."
                    @endswitch
                </p>
                <p class="mt-3 mb-0" style="color:#c9a84c; font-size:.85rem; font-weight:600;">— {{ $product->name }}</p>
            </div>

            {{-- DESKRIPSI --}}
            <p class="text-muted lh-lg mb-4">{{ $product->description }}</p>

            {{-- TASTE NOTES --}}
            <div class="mb-4">
                <h6 class="fw-bold mb-2" style="color:#1a3a2a;">Taste Notes</h6>
                @switch($product->category)
                    @case('Gin')
                        <span class="taste-badge">🌿 Botanical</span>
                        <span class="taste-badge">🍋 Sitrus</span>
                        <span class="taste-badge">🌸 Floral</span>
                        <span class="taste-badge">🌶️ Rempah</span>
                        @break
                    @case('Vodka')
                        <span class="taste-badge">💧 Bersih</span>
                        <span class="taste-badge">❄️ Smooth</span>
                        <span class="taste-badge">🍋 Segar</span>
                        @break
                    @case('Rum')
                        <span class="taste-badge">🍯 Caramel</span>
                        <span class="taste-badge">🍦 Vanilla</span>
                        <span class="taste-badge">🌴 Tropis</span>
                        <span class="taste-badge">🍬 Manis</span>
                        @break
                    @case('Soju')
                        <span class="taste-badge">💧 Ringan</span>
                        <span class="taste-badge">❄️ Segar</span>
                        <span class="taste-badge">🌾 Grain</span>
                        @break
                    @case('Whisky')
                        <span class="taste-badge">🍯 Madu</span>
                        <span class="taste-badge">🪵 Oak</span>
                        <span class="taste-badge">🍦 Vanilla</span>
                        <span class="taste-badge">🍎 Fruity</span>
                        @break
                    @case('Cold Brew')
                        <span class="taste-badge">☕ Kopi</span>
                        <span class="taste-badge">🍫 Coklat</span>
                        <span class="taste-badge">🌰 Nutty</span>
                        @break
                @endswitch
            </div>

            {{-- SPESIFIKASI --}}
            <h6 class="fw-bold mb-3" style="color:#1a3a2a;">Spesifikasi Produk</h6>
            <div class="spec-item">
                <span class="spec-label"><i class="bi bi-tag me-2"></i>Kategori</span>
                <span class="spec-value">{{ $product->category }}</span>
            </div>
            <div class="spec-item">
                <span class="spec-label"><i class="bi bi-geo-alt me-2"></i>Asal</span>
                <span class="spec-value">{{ $product->origin }}</span>
            </div>
            <div class="spec-item">
                <span class="spec-label"><i class="bi bi-droplet me-2"></i>Volume</span>
                <span class="spec-value">{{ $product->volume }}</span>
            </div>
            @if($product->abv)
            <div class="spec-item">
                <span class="spec-label"><i class="bi bi-percent me-2"></i>Kadar Alkohol</span>
                <span class="spec-value">{{ $product->abv }}</span>
            </div>
            @endif

            {{-- HARGA --}}
            <div class="p-4 rounded-3 my-4" style="background:#e8f5e9;">
                <p class="text-muted mb-1 small">Harga</p>
                <h2 class="price-tag mb-0" style="font-size:2rem;">
                    Rp {{ number_format($product->price, 0, ',', '.') }}
                </h2>
            </div>

            {{-- TOMBOL --}}
            <div class="d-flex gap-3 flex-wrap">
                <a href="https://prigroup.co.id/distribution/" target="_blank" class="btn-primary-pr btn px-4">
                    <i class="bi bi-box-arrow-up-right me-2"></i>Lihat di PRI Group
                </a>
                <a href="{{ route('contact') }}" class="btn-outline-pr btn px-4">
                    <i class="bi bi-envelope me-2"></i>Hubungi Kami
                </a>
                <a href="{{ route('products.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                    <i class="bi bi-arrow-left me-2"></i>Kembali
                </a>
            </div>
        </div>
    </div>

    {{-- PRODUK TERKAIT --}}
    @if($related->count() > 0)
    <div class="mt-5 pt-4">
        <hr style="border-color:#e8d5a0;">
        <h4 style="font-family:'Playfair Display',serif; color:#1a3a2a;" class="mb-4">
            Produk {{ $product->category }} Lainnya
        </h4>
        <div class="row g-4">
            @foreach($related as $r)
            <div class="col-sm-6 col-md-4">
                <div class="card product-card">
                    <div class="card-img-wrap">
                        <img src="{{ asset('assets/images/' . $r->image) }}"
                             alt="{{ $r->name }}"
                             onerror="this.src='https://via.placeholder.com/400x240/2d6a4f/ffffff?text=Pulau+Rempah'">
                    </div>
                    <div class="card-body">
                        <span class="badge-category mb-2 d-inline-block">{{ $r->category }}</span>
                        <h6 class="fw-bold" style="font-family:'Playfair Display',serif;">{{ $r->name }}</h6>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="price-tag">Rp {{ number_format($r->price, 0, ',', '.') }}</span>
                            <a href="{{ route('products.show', $r->id) }}" class="btn-primary-pr btn btn-sm">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif

</div>
@endsection