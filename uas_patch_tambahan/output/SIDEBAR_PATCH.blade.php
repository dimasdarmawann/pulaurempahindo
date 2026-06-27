{{-- 
PATCH: Tambahkan 2 baris menu ini ke resources/views/layouts/admin.blade.php
Letakkan setelah menu "Contact Info" (sebelum closing </div> sidebar-menu)
--}}

<a href="{{ route('admin.artikel.index') }}" class="menu-item @yield('active-artikel')">
    <span class="menu-icon"><i class="fas fa-newspaper"></i></span>
    <span class="menu-text">Manajemen Artikel</span>
</a>

<a href="{{ route('admin.produk.index') }}" class="menu-item @yield('active-produk')">
    <span class="menu-icon"><i class="fas fa-box"></i></span>
    <span class="menu-text">Produk & Layanan</span>
</a>
