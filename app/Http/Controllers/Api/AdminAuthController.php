<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminAuthController extends Controller
{
    /**
     * POST /api/admin/login
     * Login khusus admin. Hanya user dengan role 'admin' yang bisa login lewat endpoint ini.
     */
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors'  => $validator->errors(),
            ], 422);
        }

        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json([
                'success' => false,
                'message' => 'Email atau password salah',
            ], 401);
        }

        if (!$user->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Akun ini bukan admin, akses ditolak',
            ], 403);
        }

        $token = $user->createToken('admin-api-token')->plainTextToken;

        return response()->json([
            'success'      => true,
            'message'      => 'Login admin berhasil',
            'access_token' => $token,
            'token_type'   => 'Bearer',
            'user'         => $user,
        ]);
    }

    /**
     * POST /api/admin/logout
     * Logout admin, hapus token yang sedang dipakai.
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'success' => true,
            'message' => 'Logout admin berhasil',
        ]);
    }

    /**
     * GET /api/admin/me
     * Cek data admin yang sedang login lewat token.
     */
    public function me(Request $request)
    {
        if (!$request->user()->isAdmin()) {
            return response()->json([
                'success' => false,
                'message' => 'Akses ditolak, bukan admin',
            ], 403);
        }

        return response()->json([
            'success' => true,
            'message' => 'Data admin yang sedang login',
            'data'    => $request->user(),
        ]);
    }
}
