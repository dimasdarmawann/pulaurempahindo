{{-- resources/views/layouts/admin.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin — Pulau Rempah')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        :root {
            --green-dark: #1a3a2a;
            --green-mid:  #2d6a4f;
            --gold:       #c9a84c;
            --cream:      #f8f4e8;
        }
        body { font-family: 'Poppins', sans-serif; background: #f0f2f5; }

        /* NAVBAR */
        .navbar { background: var(--green-dark) !important; border-bottom: 2px solid var(--gold); }
        .navbar-brand { font-family: 'Playfair Display', serif; color: var(--gold) !important; }
        .nav-link { color: rgba(255,255,255,.8) !important; }
        .nav-link:hover { color: var(--gold) !important; }
        .admin-badge { background: var(--gold); color: var(--green-dark); font-size:.7rem; font-weight:700; padding:2px 8px; border-radius:20px; margin-left:4px; }

        /* PAGE HEADER */
        .page-header { background: linear-gradient(135deg, var(--green-dark), var(--green-mid)); color: #fff; padding: 28px 0; margin-bottom: 28px; border-bottom: 2px solid var(--gold); }
        .page-header h1 { font-family: 'Playfair Display', serif; font-size: 1.6rem; margin: 0; }
        .page-header p  { margin: 4px 0 0; font-size: .88rem; color: rgba(255,255,255,.7); }

        /* SIDEBAR */
        .sidebar { background: #fff; border-radius: 12px; box-shadow: 0 2px 8px rgba(0,0,0,.07); padding: 16px; }
        .sidebar .nav-link { color: #444; border-radius: 8px; padding: 10px 14px; font-size: .88rem; font-weight: 500; display: flex; align-items: center; gap: 8px; }
        .sidebar .nav-link:hover { background: var(--cream); color: var(--green-dark); }
        .sidebar .nav-link.active { background: var(--green-dark); color: var(--gold) !important; }
        .sidebar-title { font-size: .72rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; color: #aaa; padding: 8px 14px 4px; }

        /* FOOTER */
        .admin-footer { text-align: center; padding: 24px; font-size: .8rem; color: #aaa; margin-top: 40px; }
    </style>

    @yield('styles')
</head>
<body>

{{-- NAVBAR --}}
<nav class="navbar navbar-expand-lg sticky-top">
    <div class="container-fluid px-4">
        <a class="navbar-brand" href="{{ route('home') }}">🌿 Pulau Rempah</a>
        <div class="ms-auto d-flex align-items-center gap-3">
            <span style="color:rgba(255,255,255,.6); font-size:.85rem;">
                <i class="bi bi-person-circle me-1"></i>{{ auth()->user()->name ?? 'Admin' }}
                <span class="admin-badge">ADMIN</span>
            </span>
            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm" style="color:rgba(255,255,255,.7); border:1px solid rgba(255,255,255,.3);">
                    <i class="bi bi-box-arrow-right"></i> Keluar
                </button>
            </form>
        </div>
    </div>
</nav>

{{-- PAGE HEADER --}}
<div class="page-header">
    <div class="container-fluid px-4">
        <h1><i class="fas fa-shield-alt me-2" style="color:var(--gold);"></i>@yield('page-title', 'Admin Panel')</h1>
        <p>@yield('page-subtitle', 'Kelola konten Pulau Rempah')</p>
    </div>
</div>

{{-- MAIN LAYOUT --}}
<div class="container-fluid px-4 pb-4">
    <div class="row g-4">

        {{-- SIDEBAR --}}
        <div class="col-lg-2">
            <div class="sidebar">
                <div class="sidebar-title">Menu</div>
                <a href="{{ route('admin.dashboard') }}"
                   class="nav-link @yield('active-dashboard')">
                    <i class="bi bi-grid"></i> Dashboard
                </a>
                <a href="{{ route('admin.products.index') }}"
                   class="nav-link @yield('active-products')">
                    <i class="bi bi-box-seam"></i> Produk
                </a>
                <a href="{{ route('admin.artikel.index') }}"
                   class="nav-link @yield('active-artikel')">
                    <i class="bi bi-newspaper"></i> Artikel
                </a>
                <a href="{{ route('admin.contacts.index') }}"
                   class="nav-link @yield('active-contacts')">
                    <i class="bi bi-envelope"></i> Pesan Masuk
                </a>
                <hr style="margin:12px 0;">
                <a href="{{ route('home') }}" class="nav-link">
                    <i class="bi bi-arrow-left"></i> Ke Situs
                </a>
            </div>
        </div>

        {{-- MAIN CONTENT --}}
        <div class="col-lg-10">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-3" role="alert">
                    <i class="fas fa-exclamation-circle me-2"></i>{{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>

    </div>
</div>

<div class="admin-footer">
    &copy; {{ date('Y') }} Pulau Rempah — Admin Panel
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
@yield('scripts')
</body>
</html>