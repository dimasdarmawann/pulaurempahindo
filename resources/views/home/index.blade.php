@extends('layouts.app')
@section('title', 'Beranda — Pulau Rempah')

@section('styles')
<style>
    .hero { background: linear-gradient(135deg, #1a3a2a 0%, #2d6a4f 60%, #52b788 100%); min-height: 90vh; display: flex; align-items: center; position: relative; overflow: hidden; }
    .hero::before { content: ''; position: absolute; inset: 0; background: url('https://images.unsplash.com/photo-1608270586620-248524c67de9?w=1600') center/cover no-repeat; opacity: .15; }
    .hero-content { position: relative; z-index: 2; }
    .hero h1 { font-size: 3.8rem; color: #fff; line-height: 1.2; }
    .hero h1 span { color: #c9a84c; }
    .hero p { color: rgba(255,255,255,.85); font-size: 1.1rem; max-width: 520px; }
    .stat-box { background: rgba(255,255,255,.08); border: 1px solid rgba(201,168,76,.3); border-radius: 12px; padding: 20px; text-align: center; color: #fff; }
    .stat-box h3 { color: #c9a84c; font-family:'Playfair Display',serif; font-size:2rem; }
    .feature-box { background: #fff; border-radius: 16px; padding: 28px 24px; text-align: center; box-shadow: 0 4px 20px rgba(0,0,0,.06); transition: transform .3s; height: 100%; }
    .feature-box:hover { transform: translateY(-4px); }
    .feature-icon { width: 64px; height: 64px; background: #e8f5e9; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin: 0 auto 16px; font-size: 1.8rem; }
</style>
@endsection

@section('content')

{{-- HERO --}}
<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 hero-content">
                <p class="mb-2" style="color:#c9a84c; font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:.85rem;">🌿 Spirit of the Islands</p>
                <h1>Rasa <span>Nusantara</span><br>Dalam Setiap Tetes</h1>
                <p class="mt-3 mb-4">Koleksi minuman premium yang terinspirasi dari kekayaan rempah kepulauan Indonesia. Dibuat dengan bahan-bahan terbaik pilihan, dari Bali hingga Maluku.</p>
                <div class="d-flex gap-3 flex-wrap">
                    <a href="{{ route('products.index') }}" class="btn-primary-pr btn"><i class="bi bi-grid me-2"></i>Lihat Koleksi</a>
                    <a href="{{ route('about') }}" class="btn-outline-pr btn">Tentang Kami</a>
                </div>
                <div class="row g-3 mt-5">
                    <div class="col-4"><div class="stat-box"><h3>{{ $total }}+</h3><small>Produk</small></div></div>
                    <div class="col-4"><div class="stat-box"><h3>{{ $categories->count() }}</h3><small>Kategori</small></div></div>
                    <div class="col-4"><div class="stat-box"><h3>100%</h3><small>Lokal</small></div></div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- PRODUK UNGGULAN --}}
<div class="container my-5 py-3">
    <div class="text-center mb-5">
        <p style="color:#52b788; font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:.85rem;">Pilihan Terbaik</p>
        <h2 class="section-title">Produk Unggulan</h2>
        <div class="divider-gold"></div>
        <p class="section-subtitle">Koleksi premium kami yang paling digemari</p>
    </div>
    <div class="row g-4">
        @foreach($featured as $product)
        <div class="col-sm-6 col-lg-3">
            <div class="card product-card">
                <div class="card-img-wrap">
                    <span class="badge-featured">⭐ Unggulan</span>
                    <img src="{{ asset('assets/images/' . $product->image) }}" alt="{{ $product->name }}"
                         onerror="this.src='https://via.placeholder.com/400x240/2d6a4f/ffffff?text=Pulau+Rempah'">
                </div>
                <div class="card-body d-flex flex-column">
                    <span class="badge-category mb-2">{{ $product->category }}</span>
                    <h6 class="fw-bold mt-1" style="font-family:'Playfair Display',serif;">{{ $product->name }}</h6>
                    <p class="text-muted small flex-grow-1">{{ Str::limit($product->description, 70) }}</p>
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <span class="price-tag">Rp {{ number_format($product->price, 0, ',', '.') }}</span>
                        <a href="{{ route('products.show', $product->id) }}" class="btn-primary-pr btn btn-sm">Detail</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="text-center mt-5">
        <a href="{{ route('products.index') }}" class="btn-outline-pr btn px-5">Lihat Semua Produk <i class="bi bi-arrow-right ms-2"></i></a>
    </div>
</div>

{{-- KATEGORI --}}
<div style="background:#fff; padding:60px 0;">
    <div class="container">
        <div class="text-center mb-5">
            <p style="color:#52b788; font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:.85rem;">Koleksi Kami</p>
            <h2 class="section-title">Kategori Produk</h2>
            <div class="divider-gold"></div>
        </div>
        <div class="row g-4 justify-content-center">
            @foreach([['icon'=>'🍸','cat'=>'Gin','desc'=>'Botanical gin khas Nusantara'],['icon'=>'🥃','cat'=>'Rum','desc'=>'Rum dari tebu pilihan Indonesia'],['icon'=>'🍶','cat'=>'Arak','desc'=>'Arak tradisional otentik'],['icon'=>'🍯','cat'=>'Liqueur','desc'=>'Liqueur rempah premium']] as $item)
            <div class="col-6 col-md-3">
                <a href="{{ route('products.index', ['category' => $item['cat']]) }}" class="text-decoration-none">
                    <div class="feature-box">
                        <div class="feature-icon">{{ $item['icon'] }}</div>
                        <h5 class="fw-bold mb-1" style="color:#1a3a2a;">{{ $item['cat'] }}</h5>
                        <p class="text-muted mb-0" style="font-size:.85rem;">{{ $item['desc'] }}</p>
                    </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- KEUNGGULAN --}}
<div class="container my-5 py-3">
    <div class="text-center mb-5">
        <p style="color:#52b788; font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:.85rem;">Mengapa Kami</p>
        <h2 class="section-title">Keunggulan Pulau Rempah</h2>
        <div class="divider-gold"></div>
    </div>
    <div class="row g-4">
        @foreach([['icon'=>'🌿','title'=>'Bahan Lokal Premium','desc'=>'Semua bahan baku dipilih langsung dari petani lokal terbaik di seluruh Indonesia.'],['icon'=>'🏆','title'=>'Kualitas Terjamin','desc'=>'Setiap produk melalui proses quality control ketat untuk memastikan cita rasa terbaik.'],['icon'=>'🍃','title'=>'Ramah Lingkungan','desc'=>'Proses produksi kami memperhatikan kelestarian alam dan lingkungan sekitar.'],['icon'=>'🚚','title'=>'Pengiriman Seluruh Indonesia','desc'=>'Kami melayani pengiriman ke seluruh wilayah Indonesia dengan aman dan terpercaya.']] as $item)
        <div class="col-sm-6 col-lg-3">
            <div class="feature-box">
                <div class="feature-icon">{{ $item['icon'] }}</div>
                <h5 class="fw-bold mb-2" style="color:#1a3a2a;">{{ $item['title'] }}</h5>
                <p class="text-muted mb-0" style="font-size:.88rem; line-height:1.7;">{{ $item['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection