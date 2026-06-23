<?php

use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\Admin\ProductAdminController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

/*
|--------------------------------------------------------------------------
| Admin Routes — CRUD Produk (khusus admin, wajib login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('products', ProductAdminController::class)->except(['show']);

    // Pesan kontak masuk
    Route::get('/contacts', [ContactAdminController::class, 'index'])->name('contacts.index');
    Route::get('/contacts/{contact}', [ContactAdminController::class, 'show'])->name('contacts.show');
    Route::delete('/contacts/{contact}', [ContactAdminController::class, 'destroy'])->name('contacts.destroy');

    // Halaman CRUD AJAX (konsumsi REST API)
    Route::get('/products-ajax', function () {
        return view('admin.products.ajax');
    })->name('products.ajax');

    // Export PDF
    Route::get('/products-export/pdf', [ProductAdminController::class, 'exportPdf'])->name('products.export.pdf');
    Route::get('/products/{product}/pdf', [ProductAdminController::class, 'exportPdfDetail'])->name('products.export.pdf.detail');
});

require __DIR__ . '/auth.php';
