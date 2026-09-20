<h1>Daftar Produk</h1>

<table border="1" cellpadding="10">
    <tr>
        <th>No.</th>
        <th>Nama Produk</th>
        <th>SKU</th>
        <th>Harga</th>
        <th>Stok</th>
        <th>Gambar</th>
    </tr>

    @foreach ($barang as $index => $item)
        <tr>
            <td>{{ $index + 1 }}</td>
            <td>{{ $item['nama_produk'] }}</td>
            <td>{{ $item['sku'] }}</td>
            <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
            <td>{{ $item['stok'] }}</td>
            <td>
                <img src="{{ asset('images/' . $item['gambar']) }}" width="100" alt="{{ $item['nama_produk'] }}">
            </td>
        </tr>
    @endforeach
</table>