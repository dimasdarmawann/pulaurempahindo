@extends('layouts.app')
@section('title', 'CRUD AJAX Produk — Admin')

@section('content')
<div style="background: linear-gradient(135deg, #1a3a2a, #2d6a4f); padding:50px 0; color:#fff;">
    <div class="container">
        <p style="color:#c9a84c; font-weight:600; letter-spacing:2px; text-transform:uppercase; font-size:.85rem; margin-bottom:8px;">Panel Admin</p>
        <h2 style="font-family:'Playfair Display',serif; font-size:2.2rem;">CRUD Produk (AJAX / REST API)</h2>
        <p class="small" style="color:rgba(255,255,255,.7);">Semua aksi di halaman ini langsung memanggil REST API <code>/api/products</code> tanpa reload halaman.</p>
    </div>
</div>

<div class="container my-5">

    <div id="alertBox" class="alert d-none" role="alert"></div>

    <div class="d-flex justify-content-between align-items-center mb-4">
        <input type="text" id="searchInput" class="form-control rounded-pill" placeholder="Cari produk..." style="max-width:300px;">
        <button class="btn btn-primary-pr" data-bs-toggle="modal" data-bs-target="#productModal" id="btnTambah">
            <i class="bi bi-plus-lg"></i> Tambah Produk
        </button>
    </div>

    <div class="card border-0 rounded-4 shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead style="background:#f0ead9;">
                        <tr>
                            <th>Nama Produk</th>
                            <th>Kategori</th>
                            <th>Harga</th>
                            <th>Stok/Volume</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="productTableBody">
                        <tr><td colspan="5" class="text-center text-muted py-4">Memuat data...</td></tr>
                    </tbody>
                </table>
            </div>
            <div id="paginationBox" class="mt-3 d-flex justify-content-center gap-2"></div>
        </div>
    </div>
</div>

<!-- MODAL FORM TAMBAH/EDIT -->
<div class="modal fade" id="productModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4">
            <div class="modal-header" style="background:#1a3a2a; color:#fff;">
                <h5 class="modal-title" id="modalTitle">Tambah Produk</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="productForm">
                    <input type="hidden" id="productId">

                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Nama Produk</label>
                            <input type="text" id="name" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Kategori</label>
                            <input type="text" id="category" class="form-control" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label small fw-semibold">Deskripsi</label>
                            <textarea id="description" class="form-control" rows="3" required></textarea>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Asal</label>
                            <input type="text" id="origin" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">Volume</label>
                            <input type="text" id="volume" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label small fw-semibold">ABV</label>
                            <input type="text" id="abv" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Harga (Rp)</label>
                            <input type="number" id="price" class="form-control" min="0" required>
                        </div>
                        <div class="col-md-6 d-flex align-items-end">
                            <div class="form-check">
                                <input type="checkbox" id="featured" class="form-check-input">
                                <label class="form-check-label small" for="featured">Produk Unggulan</label>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary-pr" id="btnSubmit">Simpan</button>
            </div>
        </div>
    </div>
</div>

<script>
const API_URL = "{{ url('/api/products') }}";
let currentPage = 1;
let searchTimeout;

document.addEventListener('DOMContentLoaded', () => loadProducts());

document.getElementById('searchInput').addEventListener('input', function () {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(() => { currentPage = 1; loadProducts(); }, 400);
});

document.getElementById('btnTambah').addEventListener('click', () => {
    document.getElementById('productForm').reset();
    document.getElementById('productId').value = '';
    document.getElementById('modalTitle').innerText = 'Tambah Produk';
});

function showAlert(message, type = 'success') {
    const box = document.getElementById('alertBox');
    box.className = `alert alert-${type}`;
    box.innerText = message;
    box.classList.remove('d-none');
    setTimeout(() => box.classList.add('d-none'), 3000);
}

async function loadProducts(page = 1) {
    currentPage = page;
    const search = document.getElementById('searchInput').value;
    const url = `${API_URL}?page=${page}&search=${encodeURIComponent(search)}`;

    try {
        const res = await fetch(url, { headers: { 'Accept': 'application/json' } });
        const json = await res.json();
        renderTable(json.data.data);
        renderPagination(json.data);
    } catch (err) {
        document.getElementById('productTableBody').innerHTML =
            `<tr><td colspan="5" class="text-center text-danger py-4">Gagal memuat data: ${err.message}</td></tr>`;
    }
}

function renderTable(products) {
    const tbody = document.getElementById('productTableBody');

    if (!products.length) {
        tbody.innerHTML = `<tr><td colspan="5" class="text-center text-muted py-4">Tidak ada produk ditemukan.</td></tr>`;
        return;
    }

    tbody.innerHTML = products.map(p => `
        <tr>
            <td class="fw-semibold">${escapeHtml(p.name)}</td>
            <td><span class="badge-category">${escapeHtml(p.category)}</span></td>
            <td>Rp ${Number(p.price).toLocaleString('id-ID')}</td>
            <td>${escapeHtml(p.volume)}</td>
            <td class="text-center">
                <button class="btn btn-sm btn-warning text-white" onclick="editProduct(${p.id})">Edit</button>
                <button class="btn btn-sm btn-danger" onclick="deleteProduct(${p.id})">Hapus</button>
            </td>
        </tr>
    `).join('');
}

function renderPagination(data) {
    const box = document.getElementById('paginationBox');
    if (data.last_page <= 1) { box.innerHTML = ''; return; }

    let html = '';
    for (let i = 1; i <= data.last_page; i++) {
        html += `<button class="btn btn-sm ${i === data.current_page ? 'btn-primary-pr' : 'btn-outline-pr'}"
                         onclick="loadProducts(${i})">${i}</button>`;
    }
    box.innerHTML = html;
}

async function editProduct(id) {
    try {
        const res = await fetch(`${API_URL}/${id}`, { headers: { 'Accept': 'application/json' } });
        const json = await res.json();
        const p = json.data;

        document.getElementById('productId').value = p.id;
        document.getElementById('name').value = p.name;
        document.getElementById('category').value = p.category;
        document.getElementById('description').value = p.description;
        document.getElementById('origin').value = p.origin;
        document.getElementById('volume').value = p.volume;
        document.getElementById('abv').value = p.abv ?? '';
        document.getElementById('price').value = p.price;
        document.getElementById('featured').checked = !!p.featured;
        document.getElementById('modalTitle').innerText = 'Edit Produk';

        new bootstrap.Modal(document.getElementById('productModal')).show();
    } catch (err) {
        showAlert('Gagal mengambil data produk: ' + err.message, 'danger');
    }
}

document.getElementById('btnSubmit').addEventListener('click', async () => {
    const id = document.getElementById('productId').value;
    const payload = {
        name: document.getElementById('name').value,
        category: document.getElementById('category').value,
        description: document.getElementById('description').value,
        origin: document.getElementById('origin').value,
        volume: document.getElementById('volume').value,
        abv: document.getElementById('abv').value,
        price: document.getElementById('price').value,
        featured: document.getElementById('featured').checked,
    };

    const isEdit = !!id;
    const url = isEdit ? `${API_URL}/${id}` : API_URL;
    const method = isEdit ? 'PUT' : 'POST';

    try {
        const res = await fetch(url, {
            method,
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
            },
            body: JSON.stringify(payload),
        });

        const json = await res.json();

        if (!res.ok) {
            const firstError = json.errors ? Object.values(json.errors)[0][0] : json.message;
            showAlert(firstError, 'danger');
            return;
        }

        bootstrap.Modal.getInstance(document.getElementById('productModal')).hide();
        showAlert(json.message, 'success');
        loadProducts(currentPage);

    } catch (err) {
        showAlert('Terjadi kesalahan: ' + err.message, 'danger');
    }
});

async function deleteProduct(id) {
    if (!confirm('Yakin ingin menghapus produk ini?')) return;

    try {
        const res = await fetch(`${API_URL}/${id}`, {
            method: 'DELETE',
            headers: { 'Accept': 'application/json' },
        });
        const json = await res.json();

        showAlert(json.message, res.ok ? 'success' : 'danger');
        loadProducts(currentPage);
    } catch (err) {
        showAlert('Gagal menghapus: ' + err.message, 'danger');
    }
}

function escapeHtml(text) {
    const div = document.createElement('div');
    div.innerText = text ?? '';
    return div.innerHTML;
}
</script>
@endsection
