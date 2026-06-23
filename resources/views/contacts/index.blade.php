@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h2 class="fw-bold text-center mb-4">📬 Hubungi Kami</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <div class="card shadow-sm border-0">
                <div class="card-body p-4">
                    <form method="POST" action="{{ url('/contact') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-bold">Nama</label>
                            <input type="text" name="name" class="form-control"
                                   placeholder="Nama lengkap" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" name="email" class="form-control"
                                   placeholder="Email aktif" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">No. HP</label>
                            <input type="text" name="phone" class="form-control"
                                   placeholder="08xxxxxxxxxx">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Minat Produk</label>
                            <input type="text" name="product_interest" class="form-control"
                                   placeholder="Produk apa yang diminati?">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Pesan</label>
                            <textarea name="message" class="form-control"
                                      rows="5" placeholder="Tulis pesan..." required></textarea>
                        </div>
                        <button type="submit" class="btn btn-success w-100">
                            🚀 Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection