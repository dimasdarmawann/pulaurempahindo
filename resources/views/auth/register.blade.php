@extends('layouts.app')
@section('title', 'Daftar Akun — Pulau Rempah')

@section('content')
<div style="background: linear-gradient(135deg, #1a3a2a, #2d6a4f); min-height: 80vh; display:flex; align-items:center; padding: 60px 0;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card border-0 rounded-4 shadow-lg p-4" style="background:#f8f4e8;">
                    <div class="card-body">
                        <div class="text-center mb-4">
                            <h3 style="font-family:'Playfair Display',serif; color:#1a3a2a;">Buat Akun Baru</h3>
                            <p class="text-muted small">Pulau Rempah — Spirit of the Islands</p>
                        </div>

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control rounded-3"
                                       value="{{ old('name') }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Email</label>
                                <input type="email" name="email" class="form-control rounded-3"
                                       value="{{ old('email') }}" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Password</label>
                                <input type="password" name="password" class="form-control rounded-3" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold small">Konfirmasi Password</label>
                                <input type="password" name="password_confirmation" class="form-control rounded-3" required>
                            </div>

                            <button type="submit" class="btn btn-primary-pr w-100 mb-3">Daftar</button>

                            <p class="text-center small text-muted mb-0">
                                Sudah punya akun? <a href="{{ route('login') }}" style="color:#2d6a4f; font-weight:600;">Masuk di sini</a>
                            </p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
