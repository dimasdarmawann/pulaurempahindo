@extends('layouts.app')

@section('title', 'Detail Pesan')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <a href="{{ route('admin.contacts.index') }}" class="btn btn-outline-secondary mb-4">
                ← Kembali
            </a>

            <div class="card shadow-sm border-0">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0">📨 Detail Pesan</h5>
                </div>
                <div class="card-body p-4">
                    <table class="table table-borderless">
                        <tr>
                            <th width="180">Nama</th>
                            <td>{{ $contact->name }}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ $contact->email }}</td>
                        </tr>
                        <tr>
                            <th>No. HP</th>
                            <td>{{ $contact->phone ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Minat Produk</th>
                            <td>{{ $contact->product_interest ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{ $contact->created_at->format('d M Y H:i') }}</td>
                        </tr>
                        <tr>
                            <th>Pesan</th>
                            <td>{{ $contact->message }}</td>
                        </tr>
                    </table>

                    <form action="{{ route('admin.contacts.destroy', $contact->id) }}"
                          method="POST"
                          onsubmit="return confirm('Hapus pesan ini permanen?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">🗑 Hapus Pesan</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection