# PANDUAN SETUP — Pulau Rempah (Laravel CRUD + Login + DOMPDF + REST API)

Project ini sudah ditambahkan 5 fitur baru di atas project Laravel `pulau_rempah` yang sudah ada:

1. **Login Laravel** (gaya Breeze, manual — tanpa perlu install via composer create-project)
2. **CRUD Admin Product** (Create, Read, Update, Delete — khusus admin yang login)
3. **DOMPDF** — export PDF daftar produk & detail per produk
4. **REST API Product** — endpoint JSON lengkap di `/api/products`
5. **CRUD AJAX Product** — halaman admin yang full AJAX (fetch JS) konsumsi REST API di atas

---

## 0. UPDATE TERBARU — REST API User (Register/Login/Insert Data)

Kalau kamu sudah pernah jalanin `composer install` dan `php artisan migrate` sebelumnya, **wajib jalanin ulang** ini supaya fitur API User (Register/Login/Insert Data, seperti contoh di video tutorial) bisa jalan:

```bash
composer require laravel/sanctum
php artisan migrate
```

Migration baru yang akan dijalankan: kolom `phone` & `address` di tabel `users`, dan tabel `personal_access_tokens` (dibutuhkan Sanctum untuk menyimpan token API).

---

## 1. Install Dependency

Karena environment saya tidak punya akses internet ke Packagist, dependency **belum di-install**. Jalankan ini di komputer kamu:

```bash
cd pulau_rempah
composer install
```

Composer akan otomatis install package baru yang sudah saya tambahkan di `composer.json`:
- `barryvdh/laravel-dompdf` (untuk export PDF)
- `laravel/sanctum` (opsional, untuk API auth di masa depan)
- `laravel/breeze` (dev dependency, tidak wajib dipakai karena view login/register sudah saya buatkan manual)

Jika ada **conflict version**, jalankan:
```bash
composer update
```

---

## 2. Setup Environment

```bash
cp .env.example .env
php artisan key:generate
```

Edit `.env`, sesuaikan koneksi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pulau_rempah
DB_USERNAME=root
DB_PASSWORD=
```

Buat database kosong bernama `pulau_rempah` di MySQL/phpMyAdmin terlebih dahulu.

---

## 3. Migrasi & Seeder

```bash
php artisan migrate
php artisan db:seed
```

Ini akan otomatis:
- Membuat semua tabel (products, contacts, users, dst)
- Menambahkan kolom `role` ke tabel users
- Mengisi data produk contoh (dari `ProductSeeder` yang sudah ada)
- **Membuat akun admin default:**

```
Email    : admin@pulaurempah.com
Password : admin12345
```

> **PENTING:** Ganti password ini setelah login pertama kali untuk keamanan, atau edit langsung di `database/seeders/AdminSeeder.php` sebelum migrate.

---

## 4. Storage Link (untuk upload gambar produk)

```bash
php artisan storage:link
```

Ini wajib dijalankan supaya gambar produk yang diupload admin bisa diakses dari browser.

---

## 5. Jalankan Server

```bash
php artisan serve
```

Buka di browser: `http://localhost:8000`

---

## Peta Fitur & URL

| Fitur | URL | Keterangan |
|---|---|---|
| Halaman utama | `/` | Sama seperti sebelumnya |
| Login | `/login` | Form login |
| Register | `/register` | Daftar akun baru (role default: `user`) |
| Dashboard Admin | `/admin/dashboard` | Wajib login sebagai admin |
| CRUD Produk (biasa) | `/admin/products` | List, tambah, edit, hapus produk |
| Tambah Produk | `/admin/products/create` | Form tambah |
| CRUD Produk (AJAX) | `/admin/products-ajax` | Versi tanpa reload, pakai fetch JS |
| Export PDF (daftar) | `/admin/products-export/pdf` | Download laporan semua produk |
| Export PDF (detail) | `/admin/products/{id}/pdf` | Download detail satu produk |
| REST API — List | `GET /api/products` | Support `?search=` dan `?category=` |
| REST API — Detail | `GET /api/products/{id}` | — |
| REST API — Tambah | `POST /api/products` | Body JSON |
| REST API — Update | `PUT /api/products/{id}` | Body JSON |
| REST API — Hapus | `DELETE /api/products/{id}` | — |

### REST API — User (Register, Login, CRUD User)

| Fitur | URL | Keterangan |
|---|---|---|
| Register | `POST /api/register` | Daftar user baru, otomatis dapat token |
| Login | `POST /api/login` | Login, dapat token Sanctum |
| Logout | `POST /api/logout` | Wajib kirim header `Authorization: Bearer {token}` |
| Cek user login | `GET /api/me` | Wajib kirim header `Authorization: Bearer {token}` |
| List semua user | `GET /api/users` | — |
| Insert data user | `POST /api/users` | Mirip "Insert Data" — tanpa proses login |
| Detail user | `GET /api/users/{id}` | — |
| Update user | `PUT /api/users/{id}` | — |
| Hapus user | `DELETE /api/users/{id}` | — |

**Contoh Body Register/Insert User (raw JSON):**
```json
{
    "name": "Linda",
    "email": "linda@contoh.com",
    "password": "linda123",
    "phone": "081233333333",
    "address": "Jakarta",
    "role": "user"
}
```

**Contoh Body Login:**
```json
{
    "email": "linda@contoh.com",
    "password": "linda123"
}
```

Response Login/Register akan mengembalikan `token` — gunakan token ini di header **Authorization** untuk endpoint yang butuh login:
```
Authorization: Bearer 1|xxxxxxxxxxxxxxxxxxxxxxxxx
```

---

## Cara Kerja Sistem Role Admin

- Tabel `users` punya kolom baru `role` (default: `user`)
- User dengan `role = 'admin'` bisa akses semua route `/admin/*`
- Proteksi dilakukan lewat **Middleware** `AdminMiddleware` (`app/Http/Middleware/AdminMiddleware.php`), didaftarkan sebagai alias `admin` di `bootstrap/app.php`
- Kalau user biasa (bukan admin) mencoba akses `/admin/*`, akan kena **403 Forbidden**

Untuk menjadikan user lain sebagai admin, jalankan via Tinker:
```bash
php artisan tinker
```
```php
$user = App\Models\User::where('email', 'email@user.com')->first();
$user->role = 'admin';
$user->save();
```

---

## Testing REST API (pakai Postman / Insomnia / curl)

**List semua produk:**
```bash
curl http://localhost:8000/api/products
```

**Tambah produk baru:**
```bash
curl -X POST http://localhost:8000/api/products \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{
    "name": "Pala Banda",
    "description": "Pala asli kepulauan Banda",
    "category": "Rempah",
    "origin": "Maluku",
    "volume": "250gr",
    "price": 85000
  }'
```

**Update produk:**
```bash
curl -X PUT http://localhost:8000/api/products/1 \
  -H "Content-Type: application/json" \
  -H "Accept: application/json" \
  -d '{"price": 95000}'
```

**Hapus produk:**
```bash
curl -X DELETE http://localhost:8000/api/products/1 \
  -H "Accept: application/json"
```

---

## Catatan Tambahan

- View login/register/dashboard admin sudah disesuaikan temanya (gold-green) dengan layout existing `layouts/app.blade.php`, jadi tidak perlu desain ulang.
- Navbar otomatis menampilkan menu "Masuk" kalau belum login, atau "Dashboard Admin" + nama user + tombol Keluar kalau sudah login.
- File PDF (`pdf-list.blade.php` dan `pdf-detail.blade.php`) sengaja ditulis dengan CSS sederhana (tanpa flexbox/grid) karena DOMPDF tidak mendukung CSS modern.
- Halaman CRUD AJAX (`/admin/products-ajax`) terpisah dari CRUD biasa (`/admin/products`) — keduanya tetap berfungsi independen, silakan pilih salah satu sesuai kebutuhan presentasi/demo tugas.

---

## Troubleshooting

**Error "Class DomPDF not found"**
→ Pastikan sudah `composer install` dan cek `config/app.php` atau `bootstrap/providers.php` — Laravel 11+ biasanya auto-discover package, tidak perlu manual register provider.

**Gambar produk tidak muncul**
→ Jalankan `php artisan storage:link`, dan pastikan folder `storage/app/public/products` ada isinya.

**403 Forbidden saat akses /admin**
→ Pastikan user yang login punya `role = 'admin'` di database. Cek lewat Tinker atau phpMyAdmin.

**Error "Route [login] not defined"**
→ Pastikan `routes/auth.php` ter-require di `routes/web.php` (sudah saya tambahkan di baris terakhir `require __DIR__.'/auth.php';`).
