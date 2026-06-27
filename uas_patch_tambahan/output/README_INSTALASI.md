# PANDUAN INSTALASI PATCH UAS
## Tambahan: Middleware, CRUD Artikel, CRUD Produk/Layanan

---

## 📁 STRUKTUR FILE YANG HARUS DICOPY

```
output/
├── middleware/
│   └── AdminMiddleware.php          → copy ke: app/Http/Middleware/
│
├── models/
│   ├── Artikel.php                  → copy ke: app/Models/
│   └── Produk.php                   → copy ke: app/Models/
│
├── migrations/
│   ├── 2026_06_24_000001_create_artikels_table.php  → copy ke: database/migrations/
│   └── 2026_06_24_000002_create_produks_table.php   → copy ke: database/migrations/
│
├── controllers/
│   ├── ArtikelController.php        → copy ke: app/Http/Controllers/
│   └── ProdukController.php         → copy ke: app/Http/Controllers/
│
└── views/
    ├── artikel/
    │   ├── index.blade.php           → copy ke: resources/views/admin/artikel/
    │   ├── create.blade.php          → copy ke: resources/views/admin/artikel/
    │   └── edit.blade.php            → copy ke: resources/views/admin/artikel/
    └── produk/
        ├── index.blade.php           → copy ke: resources/views/admin/produk/
        ├── create.blade.php          → copy ke: resources/views/admin/produk/
        └── edit.blade.php            → copy ke: resources/views/admin/produk/
```

---

## ⚡ LANGKAH-LANGKAH

### 1. Copy semua file ke lokasi yang sesuai (lihat tabel atas)

### 2. Jalankan migration
```bash
php artisan migrate
```

### 3. Daftarkan Middleware

**Jika Laravel 11** — buka `bootstrap/app.php`, cari `->withMiddleware` dan tambahkan:
```php
->withMiddleware(function (Middleware $middleware) {
    $middleware->alias([
        'admin' => \App\Http\Middleware\AdminMiddleware::class,
    ]);
})
```

**Jika Laravel 10 ke bawah** — buka `app/Http/Kernel.php`, tambahkan di `$routeMiddleware`:
```php
'admin' => \App\Http\Middleware\AdminMiddleware::class,
```

### 4. Tambahkan routes ke `routes/web.php`

Buka `ROUTES_PATCH.php`, copy bagian route (bukan komentar) ke bawah isi `web.php`.
Jangan lupa tambahkan use statement di atas:
```php
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\ProdukController;
```

### 5. Tambahkan menu sidebar

Buka `SIDEBAR_PATCH.blade.php`, copy 2 blok `<a>` menu ke dalam `resources/views/layouts/admin.blade.php`
di dalam `.sidebar-menu`, setelah menu Contact Info.

### 6. Buat folder storage (jika belum ada)
```bash
php artisan storage:link
```

---

## ✅ CHECKLIST REQUIREMENT UAS SETELAH PATCH

| Requirement | Status |
|---|---|
| Authentication Manual (login/logout) | ✅ |
| Tidak pakai Breeze/Jetstream | ✅ |
| Session Laravel | ✅ |
| Password Hash | ✅ |
| Middleware proteksi admin | ✅ (AdminMiddleware baru) |
| CRUD Artikel/Berita | ✅ (baru) |
| CRUD Profil/Contact Info | ✅ (ContactInfoController) |
| CRUD Produk/Layanan | ✅ (baru) |
| CRUD Galeri/Data lain | ✅ (AssetController) |
| Report PDF | ✅ (DomPDF via ExportLaporanController) |
| Dashboard Admin | ✅ |
| Validasi Form | ✅ |
| Upload File/Gambar | ✅ (Artikel + Produk + Assets) |
