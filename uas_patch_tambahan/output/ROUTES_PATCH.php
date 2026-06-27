<?php
// ============================================================
// PATCH: Tambahkan ini ke routes/web.php
// ============================================================
// 1. Tambahkan use statement di bagian atas:
//    use App\Http\Controllers\ArtikelController;
//    use App\Http\Controllers\ProdukController;
//
// 2. Tambahkan routes di bawah route yang sudah ada:
// ============================================================

// Admin Artikel Management Routes
Route::prefix('admin/artikel')->name('admin.artikel.')->group(function () {
    Route::get('/',              [ArtikelController::class, 'index'])->name('index');
    Route::get('/create',        [ArtikelController::class, 'create'])->name('create');
    Route::post('/',             [ArtikelController::class, 'store'])->name('store');
    Route::get('/{id}/edit',     [ArtikelController::class, 'edit'])->name('edit');
    Route::put('/{id}',          [ArtikelController::class, 'update'])->name('update');
    Route::delete('/{id}',       [ArtikelController::class, 'destroy'])->name('destroy');
    Route::put('/{id}/toggle',   [ArtikelController::class, 'togglePublish'])->name('toggle');
});

// Admin Produk / Layanan Management Routes
Route::prefix('admin/produk')->name('admin.produk.')->group(function () {
    Route::get('/',              [ProdukController::class, 'index'])->name('index');
    Route::get('/create',        [ProdukController::class, 'create'])->name('create');
    Route::post('/',             [ProdukController::class, 'store'])->name('store');
    Route::get('/{id}/edit',     [ProdukController::class, 'edit'])->name('edit');
    Route::put('/{id}',          [ProdukController::class, 'update'])->name('update');
    Route::delete('/{id}',       [ProdukController::class, 'destroy'])->name('destroy');
    Route::put('/{id}/toggle',   [ProdukController::class, 'toggle'])->name('toggle');
});

// ============================================================
// PATCH: Daftarkan Middleware di bootstrap/app.php (Laravel 11)
// Atau di app/Http/Kernel.php (Laravel 10 ke bawah)
// ============================================================
//
// === UNTUK LARAVEL 11 (bootstrap/app.php) ===
// Tambahkan di dalam ->withMiddleware(function (Middleware $middleware) {
//     $middleware->alias([
//         'admin' => \App\Http\Middleware\AdminMiddleware::class,
//     ]);
// });
//
// === UNTUK LARAVEL 10 (app/Http/Kernel.php) ===
// Tambahkan di $routeMiddleware:
//     'admin' => \App\Http\Middleware\AdminMiddleware::class,
//
// ============================================================
// OPSIONAL: Pakai middleware di routes (biar lebih proper)
// Ganti semua Route::prefix('admin/...') yang butuh auth jadi:
//
// Route::middleware('admin')->group(function() {
//     Route::prefix('admin/artikel')->name('admin.artikel.')->group(function () {
//         ...
//     });
//     Route::prefix('admin/produk')->name('admin.produk.')->group(function () {
//         ...
//     });
//     // ... route admin lainnya
// });
// ============================================================
