<?php

use App\Http\Controllers\Api\AdminAuthController;
use App\Http\Controllers\Api\AuthApiController;
use App\Http\Controllers\Api\ProductApiController;
use Illuminate\Support\Facades\Route;

// REST API untuk Product (publik, tanpa auth - sesuai kebutuhan CRUD AJAX)
Route::apiResource('products', ProductApiController::class);

/*
|--------------------------------------------------------------------------
| Auth API — Register, Login, CRUD User (umum, semua role)
|--------------------------------------------------------------------------
*/
Route::post('/register', [AuthApiController::class, 'register']);
Route::post('/login', [AuthApiController::class, 'login']);

// Endpoint user — wajib login pakai Bearer Token (auth:sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/users', [AuthApiController::class, 'index']);
    Route::post('/users', [AuthApiController::class, 'store']);
    Route::get('/users/{id}', [AuthApiController::class, 'show']);
    Route::put('/users/{id}', [AuthApiController::class, 'update']);
    Route::patch('/users/{id}', [AuthApiController::class, 'update']);
    Route::delete('/users/{id}', [AuthApiController::class, 'destroy']);
    Route::post('/logout', [AuthApiController::class, 'logout']);
    Route::get('/me', function (\Illuminate\Http\Request $request) {
        return response()->json([
            'success' => true,
            'message' => 'Data user yang sedang login',
            'data'    => $request->user(),
        ]);
    });
});

/*
|--------------------------------------------------------------------------
| Admin Auth API — Login khusus admin (terpisah dari AuthApiController)
|--------------------------------------------------------------------------
*/
Route::post('/admin/login', [AdminAuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/admin/logout', [AdminAuthController::class, 'logout']);
    Route::get('/admin/me', [AdminAuthController::class, 'me']);
});
