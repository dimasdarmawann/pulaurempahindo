<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Detail {{ $product->name }} - Pulau Rempah</title>
    <style>
        body { font-family: 'Helvetica', sans-serif; color: #2c2c2c; font-size: 13px; }
        .header { text-align: center; margin-bottom: 24px; border-bottom: 2px solid #c9a84c; padding-bottom: 14px; }
        .header h1 { color: #1a3a2a; font-size: 20px; margin: 0; }
        .header p { color: #777; font-size: 11px; margin: 4px 0 0; }
        .product-name { font-size: 22px; color: #1a3a2a; font-weight: bold; margin-bottom: 4px; }
        .category-badge { display: inline-block; background: #e8f5e9; color: #2d6a4f; padding: 4px 12px; border-radius: 20px; font-size: 11px; font-weight: bold; margin-bottom: 16px; }
        table.info { width: 100%; border-collapse: collapse; margin-top: 16px; }
        table.info td { padding: 8px 10px; border-bottom: 1px solid #eee; font-size: 12px; }
        table.info td.label { width: 35%; color: #777; font-weight: bold; }
        .price-box { background: #f8f4e8; border: 1px solid #c9a84c; border-radius: 8px; padding: 14px; margin-top: 20px; text-align: center; }
        .price-box .price { font-size: 24px; color: #1a3a2a; font-weight: bold; }
        .description { margin-top: 16px; line-height: 1.6; font-size: 12px; color: #444; }
        .footer { margin-top: 30px; text-align: center; font-size: 9px; color: #999; border-top: 1px solid #eee; padding-top: 10px; }
    </style>
</head>
<body>

    <div class="header">
        <h1>Detail Produk</h1>
        <p>Pulau Rempah — Spirit of the Islands</p>
        <p>Dicetak pada: {{ now()->translatedFormat('d F Y, H:i') }} WIB</p>
    </div>

    <div class="product-name">{{ $product->name }}</div>
    <span class="category-badge">{{ $product->category }}</span>

    <table class="info">
        <tr>
            <td class="label">Asal Produk</td>
            <td>{{ $product->origin }}</td>
        </tr>
        <tr>
            <td class="label">Volume</td>
            <td>{{ $product->volume }}</td>
        </tr>
        <tr>
            <td class="label">Kadar Alkohol (ABV)</td>
            <td>{{ $product->abv ?? '-' }}</td>
        </tr>
        <tr>
            <td class="label">Produk Unggulan</td>
            <td>{{ $product->featured ? 'Ya' : 'Tidak' }}</td>
        </tr>
        <tr>
            <td class="label">Ditambahkan Pada</td>
            <td>{{ $product->created_at ? $product->created_at->translatedFormat('d F Y') : '-' }}</td>
        </tr>
    </table>

    <div class="description">
        <strong>Deskripsi:</strong><br>
        {{ $product->description }}
    </div>

    <div class="price-box">
        <div style="font-size:11px; color:#777; margin-bottom:4px;">Harga Produk</div>
        <div class="price">Rp {{ number_format($product->price, 0, ',', '.') }}</div>
    </div>

    <div class="footer">
        Dokumen ini dibuat secara otomatis oleh sistem Pulau Rempah.
    </div>

</body>
</html>