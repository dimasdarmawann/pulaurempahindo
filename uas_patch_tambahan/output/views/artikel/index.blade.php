{{-- resources/views/admin/artikel/index.blade.php --}}
@extends('layouts.admin')

@section('title', 'Manajemen Artikel')
@section('active-artikel', 'active')
@section('page-title', 'Manajemen Artikel')
@section('page-subtitle', 'Kelola berita dan artikel Diskominfo Lamongan')

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
    .badge-success { background:#d4edda; color:#155724; }
    .badge-secondary { background:#e2e3e5; color:#383d41; }
    .artikel-img { width:60px; height:45px; object-fit:cover; border-radius:6px; }
    .img-placeholder { width:60px; height:45px; background:#f0f0f0; border-radius:6px; display:flex; align-items:center; justify-content:center; color:#aaa; font-size:18px; }
    .top-bar { display:flex; justify-content:space-between; align-items:center; margin-bottom:20px; }
    .action-group { display:flex; gap:6px; }
    .empty-state { text-align:center; padding:60px 20px; color:#aaa; }
    .empty-state i { font-size:48px; margin-bottom:12px; }
    .pagination-wrapper { margin-top:20px; display:flex; justify-content:center; }
</style>

<div class="card">
    <div class="top-bar">
        <div>
            <strong>Total: {{ $artikels->total() }} Artikel</strong>
        </div>
        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Tambah Artikel
        </a>
    </div>

    @if($artikels->count() > 0)
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Gambar</th>
                <th>Judul</th>
                <th>Penulis</th>
                <th>Status</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($artikels as $i => $artikel)
            <tr>
                <td>{{ $artikels->firstItem() + $i }}</td>
                <td>
                    @if($artikel->gambar)
                        <img src="{{ asset('storage/' . $artikel->gambar) }}" alt="Gambar" class="artikel-img">
                    @else
                        <div class="img-placeholder"><i class="fas fa-image"></i></div>
                    @endif
                </td>
                <td>
                    <strong>{{ Str::limit($artikel->judul, 50) }}</strong>
                    <br><small style="color:#aaa">{{ Str::limit(strip_tags($artikel->konten), 60) }}</small>
                </td>
                <td>{{ $artikel->penulis }}</td>
                <td>
                    @if($artikel->is_published)
                        <span class="badge badge-success">Publik</span>
                    @else
                        <span class="badge badge-secondary">Draft</span>
                    @endif
                </td>
                <td>{{ $artikel->created_at->format('d M Y') }}</td>
                <td>
                    <div class="action-group">
                        <a href="{{ route('admin.artikel.edit', $artikel->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('admin.artikel.toggle', $artikel->id) }}" method="POST" style="display:inline">
                            @csrf @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm" title="{{ $artikel->is_published ? 'Sembunyikan' : 'Publikasikan' }}">
                                <i class="fas fa-{{ $artikel->is_published ? 'eye-slash' : 'eye' }}"></i>
                            </button>
                        </form>
                        <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" method="POST" style="display:inline" onsubmit="return confirm('Hapus artikel ini?')">
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
        {{ $artikels->links() }}
    </div>
    @else
    <div class="empty-state">
        <i class="fas fa-newspaper"></i>
        <p>Belum ada artikel. <a href="{{ route('admin.artikel.create') }}">Tambah sekarang</a></p>
    </div>
    @endif
</div>
@endsection
