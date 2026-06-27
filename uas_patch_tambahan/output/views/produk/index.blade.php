{{-- resources/views/admin/produk/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Produk / Layanan')
@section('active-produk', 'active')
@section('page-title', 'Produk & Layanan')
@section('page-subtitle', 'Kelola produk dan layanan Diskominfo Lamongan')

@section('content')
<style>
    .btn { display:inline-flex; align-items:center; gap:6px; padding:8px 16px; border-radius:8px; font-size:13px; font-weight:600; text-decoration:none; border:none; cursor:pointer; transition:all .2s; }
    .btn-primary { background:#3498db; color:#fff; } .btn-primary:hover { background:#2980b9; }
    .btn-success { background:#27ae60; color:#fff; } .btn-success:hover { background:#219a52; }
    .btn-warning { background:#f39c12; color:#fff; } .btn-warning:hover { background:#d68910; }
    .btn-danger  { background:#e74c3c; color:#fff; } .btn-danger:hover  { background:#c0392b; }
    .btn-sm { padding:5px 10px; font-size:12px; }
    .card { background:#fff; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,.08); padding:24px; }
    .table { width:100%; border-collapse:collapse; }
    .table th { background:#f8f9fa; padding:12px 16px; text-align:left; font-size:13px; color:#6c757d; font-weight:600; border-bottom:2px solid #dee2e6; }
    .table td { padding:12px 16px; font-size:14px; border-bottom:1px solid #f0f0f0; vertical-align:middle; }
    .table tr:hover td { background:#fafafa; }
    .badge { padding:4px 10px; border-radius:20px; font-size:11px; font-weight:600; }
    .badge-success  { background:#d4edda; color:#155724; }
    .badge-secondary { background:#e2e3e5; color:#383d41; }
    .badge-info     { background:#d1ecf1; color:#0c5460; }
    .badge-warning  { background:#fff3cd; color:#856404; }
    .produk-img { width:60px; height:60px; object-fit:cover; border-radius:8px; }
    .img-placeholder { width:60px; height:60px; background:#f0f0f0; border-radius:8px; display:flex; align-items:center; justify-content:center; color:#aaa; font-size:20px; }
    .top-bar { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
    .action-group { display:flex; gap:6px; }
    .empty-state { text-align:center; padding:60px 20px; color:#aaa; }
    .empty-state i { font-size:48px; margin-bottom:12px; }
    .pagination-wrapper { margin-top:20px; display:flex; justify-content:center; }
</style>

<div class="card">
    <div class="top-bar">
        <div>
            <strong>Total: {{ $produks->total() }} Produk/Layanan</strong>
        </div>
        <a href="{{ route('admin.produk.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Produk
        </a>
    </div>

    @if($produks->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Gambar</th>
                <th>Nama Produk/Layanan</th>
                <th>Kategori</th>
                <th>Status</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($produks as $i => $produk)
            <tr>
                <td>{{ $produks->firstItem() + $i }}</td>
                <td>
                    @if($produk->gambar)
                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar" class="produk-img">
                    @else
                        <div class="img-placeholder"><i class="fas fa-box"></i></div>
                    @endif
                </td>
                <td>
                    <strong>{{ $produk->nama }}</strong>
                    <br><small style="color:#aaa">{{ Str::limit($produk->deskripsi, 60) }}</small>
                </td>
                <td>
                    @if($produk->kategori === 'layanan')
                        <span class="badge badge-info">Layanan</span>
                    @else
                        <span class="badge badge-warning">Program</span>
                    @endif
                </td>
                <td>
                    @if($produk->is_active)
                        <span class="badge badge-success">Aktif</span>
                    @else
                        <span class="badge badge-secondary">Nonaktif</span>
                    @endif
                </td>
                <td>{{ $produk->created_at->format('d M Y') }}</td>
                <td>
                    <div class="action-group">
                        <a href="{{ route('admin.produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.produk.toggle', $produk->id) }}" method="POST" style="display:inline">
                            @csrf @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm" title="{{ $produk->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                <i class="fas fa-{{ $produk->is_active ? 'toggle-on' : 'toggle-off' }}"></i>
                            </button>
                        </form>
                        <form action="{{ route('admin.produk.destroy', $produk->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus produk ini?')">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="pagination-wrapper">
        {{ $produks->links() }}
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-box-open"></i>
        <p>Belum ada produk/layanan. <a href="{{ route('admin.produk.create') }}">Tambah sekarang</a></p>
    </div>
    @endif
</div>
@endsection
