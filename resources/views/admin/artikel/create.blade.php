{{-- resources/views/admin/artikel/create.blade.php --}}
@extends('layouts.admin')

@section('title', 'Tambah Artikel')
@section('active-artikel', 'active')
@section('page-title', 'Tambah Artikel')
@section('page-subtitle', 'Buat artikel atau berita baru')

@section('content')
<style>
    .form-card { background:#fff; border-radius:12px; box-shadow:0 2px 8px rgba(0,0,0,.08); padding:28px; max-width:800px; }
    .form-group { margin-bottom:20px; }
    .form-label { display:block; font-size:13px; font-weight:600; color:#2c3e50; margin-bottom:6px; }
    .form-label span { color:#e74c3c; }
    .form-control { width:100%; padding:10px 14px; border:1.5px solid #dee2e6; border-radius:8px; font-size:14px; transition:border-color .2s; box-sizing:border-box; }
    .form-control:focus { outline:none; border-color:#3498db; }
    textarea.form-control { min-height:200px; resize:vertical; font-family:inherit; }
    .form-check { display:flex; align-items:center; gap:8px; margin-top:6px; }
    .form-check input { width:18px; height:18px; cursor:pointer; }
    .btn { display:inline-flex; align-items:center; gap:6px; padding:10px 20px; border-radius:8px; font-size:14px; font-weight:600; text-decoration:none; border:none; cursor:pointer; transition:all .2s; }
    .btn-primary { background:#3498db; color:#fff; } .btn-primary:hover { background:#2980b9; }
    .btn-secondary { background:#6c757d; color:#fff; } .btn-secondary:hover { background:#5a6268; }
    .btn-group { display:flex; gap:10px; margin-top:24px; }
    .invalid-feedback { color:#e74c3c; font-size:12px; margin-top:4px; }
    .preview-img { max-width:200px; max-height:150px; border-radius:8px; margin-top:8px; display:none; }
    select.form-control { cursor:pointer; }
</style>

<div class="form-card">
    <form action="{{ route('admin.artikel.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="form-label">Judul Artikel <span>*</span></label>
            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" placeholder="Masukkan judul artikel..." required>
            @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Penulis <span>*</span></label>
            <input type="text" name="penulis" class="form-control" value="{{ old('penulis', 'Admin Diskominfo') }}" placeholder="Nama penulis..." required>
            @error('penulis') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Konten / Isi Artikel <span>*</span></label>
            <textarea name="konten" class="form-control" placeholder="Tulis isi artikel di sini..." required>{{ old('konten') }}</textarea>
            @error('konten') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Gambar Thumbnail</label>
            <input type="file" name="gambar" class="form-control" accept="image/*" onchange="previewImage(this)">
            <small style="color:#888">Format: JPG, PNG, WEBP. Maks 2MB.</small>
            <img id="previewImg" class="preview-img" alt="Preview">
            @error('gambar') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Status Publikasi</label>
            <div class="form-check">
                <input type="checkbox" name="is_published" id="is_published" value="1" {{ old('is_published') ? 'checked' : '' }}>
                <label for="is_published">Publikasikan sekarang</label>
            </div>
            <small style="color:#888">Jika tidak dicentang, artikel tersimpan sebagai Draft.</small>
        </div>

        <div class="btn-group">
            <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Artikel</button>
            <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</a>
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
