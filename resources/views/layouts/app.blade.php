<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Pulau Rempah — Spirit of the Islands')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,700;1,400&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --green-dark:  #1a3a2a;
            --green-mid:   #2d6a4f;
            --green-light: #52b788;
            --cream:       #f8f4e8;
            --gold:        #c9a84c;
            --gold-light:  #e8d5a0;
            --brown:       #5c3d2e;
        }
        body { font-family: 'Poppins', sans-serif; background-color: var(--cream); color: #2c2c2c; }
        h1, h2, h3 { font-family: 'Playfair Display', serif; }

        /* NAVBAR */
        .navbar { background-color: var(--green-dark) !important; padding: 16px 0; border-bottom: 2px solid var(--gold); }
        .navbar-brand { font-family: 'Playfair Display', serif; font-size: 1.5rem; color: var(--gold) !important; letter-spacing: 1px; }
        .navbar-brand small { display: block; font-size: .65rem; color: rgba(255,255,255,.6); letter-spacing: 3px; font-family: 'Poppins', sans-serif; font-weight: 300; text-transform: uppercase; }
        .nav-link { color: rgba(255,255,255,.8) !important; font-weight: 500; font-size: .9rem; transition: color .2s; padding: 8px 16px !important; }
        .nav-link:hover, .nav-link.active { color: var(--gold) !important; }
        .dropdown-menu { background: var(--green-dark); border: 1px solid var(--gold); border-radius: 8px; padding: 8px; }
        .dropdown-item { color: rgba(255,255,255,.8); border-radius: 6px; padding: 8px 16px; font-size: .88rem; }
        .dropdown-item:hover { background: var(--green-mid); color: var(--gold); }

        /* ADMIN BADGE */
        .admin-badge { background: var(--gold); color: var(--green-dark); font-size: .7rem; font-weight: 700; padding: 2px 8px; border-radius: 20px; margin-left: 4px; vertical-align: middle; }

        /* BUTTONS */
        .btn-primary-pr { background: var(--gold); color: var(--green-dark); border: none; border-radius: 50px; padding: 10px 28px; font-weight: 600; font-size: .9rem; transition: all .2s; }
        .btn-primary-pr:hover { background: var(--gold-light); color: var(--green-dark); transform: translateY(-2px); }
        .btn-outline-pr { background: transparent; color: var(--gold); border: 2px solid var(--gold); border-radius: 50px; padding: 8px 24px; font-weight: 500; font-size: .9rem; transition: all .2s; }
        .btn-outline-pr:hover { background: var(--gold); color: var(--green-dark); }

        /* CARD */
        .product-card { background: #fff; border: none; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,.08); transition: transform .3s, box-shadow .3s; height: 100%; }
        .product-card:hover { transform: translateY(-6px); box-shadow: 0 12px 32px rgba(0,0,0,.14); }
        .product-card img { height: 240px; object-fit: cover; width: 100%; }
        .badge-category { background: #e8f5e9; color: var(--green-mid); font-size: .75rem; font-weight: 600; border-radius: 50px; padding: 4px 12px; }
        .badge-featured { position: absolute; top: 12px; right: 12px; background: var(--gold); color: var(--green-dark); font-size: .72rem; font-weight: 700; padding: 4px 10px; border-radius: 50px; z-index: 2; }
        .card-img-wrap { position: relative; }
        .price-tag { font-family: 'Playfair Display', serif; color: var(--green-mid); font-size: 1.1rem; font-weight: 700; }

        /* HELPERS */
        .section-title { font-family: 'Playfair Display', serif; color: var(--green-dark); font-size: 2rem; }
        .section-subtitle { color: #777; font-size: .95rem; }
        .divider-gold { width: 60px; height: 3px; background: var(--gold); border-radius: 2px; margin: 12px auto 20px; }

        /* SCROLL TOP */
        #scrollTopBtn { position: fixed; bottom: 30px; right: 30px; width: 46px; height: 46px; border-radius: 50%; background: var(--green-mid); color: #fff; border: none; font-size: 1.2rem; box-shadow: 0 4px 16px rgba(0,0,0,.2); display: none; z-index: 999; cursor: pointer; transition: background .2s, transform .2s; }
        #scrollTopBtn:hover { background: var(--green-dark); transform: translateY(-3px); }

        /* FOOTER */
        footer { background: var(--green-dark); color: rgba(255,255,255,.7); padding: 50px 0 24px; margin-top: 80px; border-top: 2px solid var(--gold); }
        footer .footer-brand { font-family: 'Playfair Display', serif; font-size: 1.6rem; color: var(--gold); }
        footer a { color: rgba(255,255,255,.6); text-decoration: none; transition: color .2s; }
        footer a:hover { color: var(--gold); }
        footer hr { border-color: rgba(255,255,255,.1); }
    </style>

    @yield('styles')
</head>
<body>

<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            🌿 Pulau Rempah
            <small>Spirit of the Islands</small>
        </a>
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navMain" style="filter:invert(1);">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
            <ul class="navbar-nav ms-auto align-items-lg-center gap-1">
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ request()->routeIs('products.*') ? 'active' : '' }}" href="#" data-bs-toggle="dropdown">Produk</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('products.index') }}">🍸 Semua Produk</a></li>
                        <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,.1);"></li>
                        @foreach(['Gin','Rum','Arak','Liqueur'] as $cat)
                        <li><a class="dropdown-item" href="{{ route('products.index', ['category' => $cat]) }}">{{ $cat }}</a></li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">Tentang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" href="{{ route('contact') }}">Kontak</a>
                </li>

                @auth
                    {{-- DROPDOWN ADMIN --}}
                    @if(auth()->user()->isAdmin())
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.*') ? 'active' : '' }}"
                               href="#" data-bs-toggle="dropdown">
                                <i class="bi bi-speedometer2"></i> Admin
                                <span class="admin-badge">ADMIN</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.dashboard') ? 'text-warning' : '' }}"
                                       href="{{ route('admin.dashboard') }}">
                                        <i class="bi bi-grid me-2"></i>Dashboard
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider" style="border-color:rgba(255,255,255,.1);"></li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.products.*') ? 'text-warning' : '' }}"
                                       href="{{ route('admin.products.index') }}">
                                        <i class="bi bi-box-seam me-2"></i>Manajemen Produk
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.artikel.*') ? 'text-warning' : '' }}"
                                       href="{{ route('admin.artikel.index') }}">
                                        <i class="bi bi-newspaper me-2"></i>Manajemen Artikel
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item {{ request()->routeIs('admin.contacts.*') ? 'text-warning' : '' }}"
                                       href="{{ route('admin.contacts.index') }}">
                                        <i class="bi bi-envelope me-2"></i>Pesan Masuk
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    {{-- USER DROPDOWN --}}
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                            <i class="bi bi-person-circle"></i> {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="bi bi-box-arrow-right me-2"></i>Keluar
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">Masuk</a>
                    </li>
                @endauth

                <li class="nav-item ms-2">
                    <a href="{{ route('products.index') }}" class="btn-primary-pr btn">Lihat Koleksi</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

@yield('content')

<footer>
    <div class="container">
        <div class="row g-4 mb-4">
            <div class="col-lg-4">
                <div class="footer-brand mb-2">🌿 Pulau Rempah</div>
                <p style="font-size:.88rem; line-height:1.8;">Menghadirkan cita rasa rempah Nusantara dalam setiap tetes minuman premium kami.</p>
            </div>
            <div class="col-lg-2 col-6">
                <h6 style="color:var(--gold); font-weight:600; margin-bottom:12px;">Navigasi</h6>
                <ul class="list-unstyled" style="font-size:.88rem;">
                    <li class="mb-2"><a href="{{ route('home') }}">Beranda</a></li>
                    <li class="mb-2"><a href="{{ route('products.index') }}">Produk</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}">Tentang</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}">Kontak</a></li>
                </ul>
            </div>
            <div class="col-lg-2 col-6">
                <h6 style="color:var(--gold); font-weight:600; margin-bottom:12px;">Produk</h6>
                <ul class="list-unstyled" style="font-size:.88rem;">
                    @foreach(['Gin','Vodka','Rum','Soju','Whisky','Cold Brew'] as $cat)
                    <li class="mb-2"><a href="{{ route('products.index', ['category' => $cat]) }}">{{ $cat }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4">
                <h6 style="color:var(--gold); font-weight:600; margin-bottom:12px;">Hubungi Kami</h6>
                <ul class="list-unstyled" style="font-size:.88rem; line-height:2;">
                    <li><i class="bi bi-geo-alt me-2" style="color:var(--gold);"></i>Bali, Indonesia</li>
                    <li><i class="bi bi-envelope me-2" style="color:var(--gold);"></i>hello@pulaurempah.id</li>
                    <li><i class="bi bi-instagram me-2" style="color:var(--gold);"></i>@pulaurempah</li>
                </ul>
            </div>
        </div>
        <hr>
        <div class="text-center" style="font-size:.82rem;">
            <p class="mb-0">&copy; {{ date('Y') }} Pulau Rempah. All rights reserved. &nbsp;|&nbsp; Nikmati dengan Bijak 🌿</p>
        </div>
    </div>
</footer>

<button id="scrollTopBtn"><i class="bi bi-arrow-up"></i></button>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const btn = document.getElementById('scrollTopBtn');
    window.addEventListener('scroll', () => btn.style.display = window.scrollY > 300 ? 'block' : 'none');
    btn.addEventListener('click', () => window.scrollTo({ top: 0, behavior: 'smooth' }));
</script>
@yield('scripts')
</body>
</html>