@extends('layouts.app')
@section('title', 'Tentang Kami — Pulau Rempah')

@section('content')

<div style="background: linear-gradient(135deg, #1a3a2a, #2d6a4f); padding:60px 0; color:#fff; text-align:center;">
    <div class="container">
        <p style="color:#c9a84c; letter-spacing:3px; text-transform:uppercase; font-size:.85rem; font-weight:600;">Our Story</p>
        <h1 style="font-family:'Playfair Display',serif; font-size:3rem;">Tentang Pulau Rempah</h1>
    </div>
</div>

<div class="container my-5">

    {{-- STORY --}}
    <div class="row align-items-center g-5 mb-5">
        <div class="col-lg-6">
            <p style="color:#52b788; font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:.85rem;">Kisah Kami</p>
            <h2 style="font-family:'Playfair Display',serif; color:#1a3a2a;">Lahir dari Kekayaan Nusantara</h2>
            <div style="width:50px; height:3px; background:#c9a84c; border-radius:2px; margin:16px 0 20px;"></div>
            <p class="text-muted lh-lg">
                PT Pulau Rempah Indonesia (PRI Group) adalah perusahaan inovatif yang berfokus pada
                pembangunan brand minuman premium di Indonesia. Kami percaya bahwa kedekatan dengan
                pelanggan adalah kunci kesuksesan bisnis.
            </p>
            <p class="text-muted lh-lg">
                Dengan jaringan distribusi yang luas di seluruh Indonesia dan tim berpengalaman,
                kami menghadirkan layanan sales, marketing, dan logistik kelas satu untuk memastikan
                setiap brand yang kami kelola selalu terwakili secara profesional.
            </p>
            <div class="mt-4">
                <a href="https://prigroup.co.id" target="_blank" class="btn-primary-pr btn px-4">
                    <i class="bi bi-box-arrow-up-right me-2"></i>Kunjungi PRI Group
                </a>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="p-5 rounded-4 text-center" style="background:linear-gradient(135deg, #e8f5e9, #f8f4e8); font-size:7rem;">
                🌿
            </div>
        </div>
    </div>

    <hr style="border-color:#e8d5a0; margin:40px 0;">

    {{-- LAYANAN --}}
    <div class="text-center mb-5">
        <h2 style="font-family:'Playfair Display',serif; color:#1a3a2a;">Layanan Kami</h2>
        <div style="width:60px; height:3px; background:#c9a84c; border-radius:2px; margin:12px auto;"></div>
    </div>
    <div class="row g-4 mb-5">
        @foreach([
            ['icon'=>'🤝','title'=>'Established Relationships','desc'=>'Hubungan langsung dengan key accounts di semua pasar utama Indonesia untuk hasil penjualan maksimal.'],
            ['icon'=>'📊','title'=>'Tracking & Analysis','desc'=>'Teknologi CRM bespoke untuk mengotomatisasi pengaturan dan pengukuran KPI penjualan secara cerdas.'],
            ['icon'=>'📣','title'=>'Marketing Services','desc'=>'Layanan marketing terintegrasi meliputi digital, live events, dan experiential outreach untuk membangun brand.'],
            ['icon'=>'🚀','title'=>'Fast Go-To-Market','desc'=>'Jaringan distribusi pihak ketiga yang komprehensif memungkinkan jangkauan ke seluruh kepulauan Indonesia.'],
        ] as $val)
        <div class="col-sm-6 col-lg-3">
            <div style="background:#fff; border-radius:16px; padding:28px 24px; text-align:center; box-shadow:0 4px 20px rgba(0,0,0,.06); height:100%;">
                <div style="font-size:2.5rem; margin-bottom:16px;">{{ $val['icon'] }}</div>
                <h5 class="fw-bold mb-2" style="color:#1a3a2a; font-family:'Playfair Display',serif;">{{ $val['title'] }}</h5>
                <p class="text-muted mb-0" style="font-size:.88rem; line-height:1.7;">{{ $val['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

    <hr style="border-color:#e8d5a0; margin:40px 0;">

    {{-- BRAND --}}
    <div class="text-center mb-5">
        <h2 style="font-family:'Playfair Display',serif; color:#1a3a2a;">Brand yang Kami Distribusikan</h2>
        <div style="width:60px; height:3px; background:#c9a84c; border-radius:2px; margin:12px auto;"></div>
    </div>
    <div class="row g-4 justify-content-center mb-5">
        @foreach([
            ['emoji'=>'🍸','name'=>'East Indies Gin (EIG)','desc'=>'Gin premium buatan Bali dengan botanicals tropis khas Indonesia.'],
            ['emoji'=>'🍶','name'=>'SKYY Vodka','desc'=>'Vodka premium asal San Francisco dengan kemurnian tinggi.'],
            ['emoji'=>'🥃','name'=>'Bacardi','desc'=>'Rum ikonik dunia yang telah berdiri lebih dari 150 tahun.'],
            ['emoji'=>'🍵','name'=>'Happy Soju','desc'=>'Soju Korea ringan dan menyegarkan untuk semua suasana.'],
            ['emoji'=>'☕','name'=>'Nusuntara Cold Brew','desc'=>'Cold brew premium dari biji kopi terbaik Nusantara.'],
            ['emoji'=>'🥂','name'=>'Little River Whisky','desc'=>'Whisky premium dengan filosofi accessible luxury.'],
        ] as $brand)
        <div class="col-sm-6 col-lg-4">
            <div style="background:#fff; border-radius:16px; padding:24px; box-shadow:0 4px 20px rgba(0,0,0,.06); display:flex; align-items:center; gap:16px;">
                <div style="font-size:2.5rem; flex-shrink:0;">{{ $brand['emoji'] }}</div>
                <div>
                    <h6 class="fw-bold mb-1" style="color:#1a3a2a; font-family:'Playfair Display',serif;">{{ $brand['name'] }}</h6>
                    <p class="text-muted mb-0" style="font-size:.85rem;">{{ $brand['desc'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <hr style="border-color:#e8d5a0; margin:40px 0;">

    {{-- TIM --}}
    <div class="text-center mb-5">
        <h2 style="font-family:'Playfair Display',serif; color:#1a3a2a;">Tim Kami</h2>
        <div style="width:60px; height:3px; background:#c9a84c; border-radius:2px; margin:12px auto;"></div>
    </div>
    <div class="row g-4 justify-content-center">
        @foreach([
            ['emoji'=>'👨‍💼','name'=>'Arief Rahman','role'=>'Founder & CEO','desc'=>'Visioner di balik PRI Group sebagai perusahaan distribusi minuman premium terdepan di Indonesia.'],
            ['emoji'=>'👨‍🍳','name'=>'Budi Santoso','role'=>'Master Distiller','desc'=>'25 tahun pengalaman dalam industri minuman premium Indonesia.'],
            ['emoji'=>'👩‍🌾','name'=>'Sari Dewi','role'=>'Head of Marketing','desc'=>'Ahli marketing yang membangun brand-brand premium di pasar Indonesia.'],
        ] as $member)
        <div class="col-sm-6 col-lg-4">
            <div style="background:#fff; border-radius:16px; padding:32px 24px; text-align:center; box-shadow:0 4px 20px rgba(0,0,0,.06);">
                <div style="font-size:4rem; margin-bottom:12px;">{{ $member['emoji'] }}</div>
                <h5 class="fw-bold mb-1" style="color:#1a3a2a; font-family:'Playfair Display',serif;">{{ $member['name'] }}</h5>
                <p style="color:#c9a84c; font-size:.85rem; font-weight:600; margin-bottom:8px;">{{ $member['role'] }}</p>
                <p class="text-muted mb-0" style="font-size:.88rem;">{{ $member['desc'] }}</p>
            </div>
        </div>
        @endforeach
    </div>

</div>
@endsection