<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Laporan Produk - Pulau Rempah</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #2c2c2c; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #c9a84c; padding-bottom: 12px; }
        .header h1 { color: #1a3a2a; font-size: 20px; margin: 0; }
        .header p { color: #777; font-size: 11px; margin: 4px 0 0; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th { background: #1a3a2a; color: #fff; padding: 8px; text-align: left; font-size: 11px; }
        td { padding: 7px 8px; border-bottom: 1px solid #ddd; font-size: 11px; }
        tr:nth-child(even) { background: #f8f4e8; }
        .featured { color: #c9a84c; font-weight: bold; }
        .footer { margin-top: 20px; text-align: center; font-size: 9px; color: #999; }
        .text-right { text-align: right; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Laporan Daftar Produk</h1>
        <p>Pulau Rempah — Spirit of the Islands</p>
        <p>Dicetak pada: {{ now()->translatedFormat('d F Y, H:i') }} WIB</p>
    </div>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Asal</th>
                <th>Volume</th>
                <th>ABV</th>
                <th class="text-right">Harga</th>
                <th>Unggulan</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($products as $i => $product)
            <tr>
                <td>{{ $i + 1 }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category }}</td>
                <td>{{ $product->origin }}</td>
                <td>{{ $product->volume }}</td>
                <td>{{ $product->abv ?? '-' }}</td>
                <td class="text-right">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                <td>{!! $product->featured ? '<span class="featured">Ya</span>' : 'Tidak' !!}</td>
            </tr>
            @empty
            <tr>
                <td colspan="8" style="text-align:center;">Belum ada data produk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

    <p style="margin-top:14px; font-size:11px;">Total produk: <strong>{{ $products->count() }}</strong></p>

    <div class="footer">
        Dokumen ini dibuat secara otomatis oleh sistem Pulau Rempah.
    </div>

</body>
</html>
