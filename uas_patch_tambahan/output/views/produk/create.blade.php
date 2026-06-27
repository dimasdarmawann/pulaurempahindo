{{-- resources/views/admin/produk/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Produk/Layanan')
@section('active-produk', 'active')
@section('page-title', 'Tambah Produk / Layanan')
@section('page-subtitle', 'Tambahkan produk atau layanan baru')

@section('content')
<style>
    .form-card { background:#fff; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,.08); padding:28px; max-width:700px; }
    .form-group { margin-bottom:20px; }
    .form-label { display:block; font-size:13px; font-weight:600; color:#2c3e50; margin-bottom:6px; }
    .form-label span { color:#e74c3c; }
    .form-control { width:100%; padding:10px 14px; border:1.5px solid #dee2e6; border-radius:8px; font-size:14px; transition:border-color .2s; box-sizing:border-box; }
    .form-control:focus { outline:none; border-color:#3498db; }
    textarea.form-control { min-height:140px; resize:vertical; font-family:inherit; }
    select.form-control { cursor:pointer; }
    .form-check { display:flex; align-items:center; gap:8px; margin-top:6px; }
    .form-check input { width:18px; height:18px; cursor:pointer; }
    .btn { display:inline-flex; align-items:center; gap:6px; padding:10px 20px; border-radius:8px; font-size:14px; font-weight:600; text-decoration:none; border:none; cursor:pointer; transition:all .2s; }
    .btn-primary { background:#3498db; color:#fff; } .btn-primary:hover { background:#2980b9; }
    .btn-secondary { background:#6c757d; color:#fff; } .btn-secondary:hover { background:#5a6268; }
    .btn-group { display:flex; gap:10px; margin-top:24px; }
    .invalid-feedback { color:#e74c3c; font-size:12px; margin-top:4px; }
    .preview-img { max-width:200px; max-height:150px; border-radius:8px; margin-top:8px; display:none; }
</style>

<div class="form-card">
    <form action="{{ route('admin.produk.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="form-label">Nama Produk / Layanan <span>*</span></label>
            <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" placeholder="Contoh: PPID Online, e-Monev..." required>
            @error('nama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Kategori <span>*</span></label>
            <select name="kategori" class="form-control" required>
                <option value="layanan" {{ old('kategori') === 'layanan' ? 'selected' : '' }}>Layanan</option>
                <option value="program" {{ old('kategori') === 'program' ? 'selected' : '' }}>Program</option>
            </select>
            @error('kategori') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Deskripsi <span>*</span></label>
            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi singkat produk/layanan..." required>{{ old('deskripsi') }}</textarea>
            @error('deskripsi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Gambar</label>
            <input type="file" name="gambar" class="form-control" accept="image/*" onchange="previewImage(this)">
            <small style="color:#888">Format: JPG, PNG, WEBP. Maks 2MB.</small>
            <img id="previewImg" class="preview-img" alt="Preview">
            @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Status</label>
            <div class="form-check">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <label for="is_active">Aktif (tampil di halaman publik)</label>
            </div>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
            <a href="{{ route('admin.produk.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
function previewImage(input) {
    const img = document.getElementById('previewImg');
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = e => { img.src = e.target.result; img.style.display = 'block'; };
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endpush
@endsection
