@csrf

<div class="row g-3">
    <div class="col-md-6">
        <label class="form-label fw-semibold small">Nama Produk</label>
        <input type="text" name="name" class="form-control rounded-3"
               value="{{ old('name', $product->name ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold small">Kategori</label>
        <input type="text" name="category" class="form-control rounded-3"
               value="{{ old('category', $product->category ?? '') }}" required>
    </div>

    <div class="col-12">
        <label class="form-label fw-semibold small">Deskripsi</label>
        <textarea name="description" rows="4" class="form-control rounded-3" required>{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold small">Asal (Origin)</label>
        <input type="text" name="origin" class="form-control rounded-3"
               value="{{ old('origin', $product->origin ?? '') }}" required>
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold small">Volume</label>
        <input type="text" name="volume" class="form-control rounded-3" placeholder="contoh: 750ml"
               value="{{ old('volume', $product->volume ?? '') }}" required>
    </div>

    <div class="col-md-4">
        <label class="form-label fw-semibold small">ABV (opsional)</label>
        <input type="text" name="abv" class="form-control rounded-3" placeholder="contoh: 40%"
               value="{{ old('abv', $product->abv ?? '') }}">
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold small">Harga (Rp)</label>
        <input type="number" name="price" class="form-control rounded-3" min="0" step="0.01"
               value="{{ old('price', $product->price ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label class="form-label fw-semibold small">Gambar Produk</label>
        <input type="file" name="image" class="form-control rounded-3" accept="image/*">
        @if (!empty($product->image))
            <small class="text-muted">Gambar saat ini: {{ $product->image }}</small>
        @endif
    </div>

    <div class="col-12">
        <div class="form-check">
            <input type="checkbox" name="featured" value="1" class="form-check-input" id="featured"
                   {{ old('featured', $product->featured ?? false) ? 'checked' : '' }}>
            <label class="form-check-label small" for="featured">Tandai sebagai produk unggulan</label>
        </div>
    </div>
</div>

<div class="d-flex gap-2 mt-4">
    <button type="submit" class="btn btn-primary-pr">{{ $submitLabel ?? 'Simpan' }}</button>
    <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
</div>
