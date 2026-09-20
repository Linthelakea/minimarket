<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;

Route::get('/laporan', LaporanController::class);

Route::get('/', [DashboardController::class, 'index']);

Route::get('/posts', [PostController::class, 'posts']);

Route::get('/login', [LoginController::class, 'showLogin']);

Route::post('/login', [LoginController::class, 'login']);

Route::get('/dashboard_admin', function () {
    return view('dashboard_admin');
});

Route::get('/dashboard_kasir', function () {
    return view('dashboard_kasir');
});

Route::get('/', function () {
 return view('welcome');
});

// Routing menuju Controller
Route::get('/produk', [ProdukController::class, 'index']);

Route::get('/produk/{id}', [ProdukController::class, 'show']);

// Route::get('/', function () {
//     // Mengirim data ke view menggunakan array asosiatif
//     return view('dashboard_pos', [
//         'nama_pegawai' => 'Budi Santoso',
//         'shift' => 'Pagi (08:00 - 15:00)'
//     ]);
// });

// Route::get('/produk/{id}', function ($id) {
//     return 'Menampilkan data produk dengan ID: ' . $id;
// });
// // Rute dengan Parameter Opsional (Mencari produk berdasarkan nama)
// Route::get('/produk/cari/{nama?}', function ($nama = null) {
//     if ($nama) {
//         return 'Hasil pencarian produk: ' . $nama;
//     }
//     return 'Silakan masukkan kata kunci pencarian pada URL 
//     (contoh: /produk/cari/sabun)';
// });
// // Group Rute untuk Fitur Admin (Manajemen Data)
// Route::prefix('admin')->group(function () {
//     Route::get('/produk', function () {
//         return 'Halaman Kelola Produk (Hanya Admin)';
//     })->name('admin.produk');
//     Route::get('/kategori', function () {
//         return 'Halaman Kelola Kategori Produk (Hanya Admin)';
//     })->name('admin.kategori');
// });
// // Group Rute untuk Fitur Kasir (Transaksi)
// Route::prefix('kasir')->group(function () {
//     Route::get('/transaksi', function () {
//         return 'Halaman Input Transaksi Penjualan (Kasir)';
//     })->name('kasir.transaksi');
// });

Route::get('/daftar_produk', function () {

    $barang = [
        [
            'nama_produk' => 'Beras 1kg',
            'sku' => 'BRS001',
            'harga' => 14000,
            'stok' => 12,
            'gambar' => 'beras.webp',
        ],
        [
            'nama_produk' => 'Beras Premium 1kg',
            'sku' => 'BRS002',
            'harga' => 17500,
            'stok' => 25,
            'gambar' => 'beras.webp',
        ],
        [
            'nama_produk' => 'Gula Pasir 1kg',
            'sku' => 'GLA001',
            'harga' => 17000,
            'stok' => 18,
            'gambar' => 'gula.webp',
        ],
        [
            'nama_produk' => 'Minyak Goreng 1L',
            'sku' => 'MYK001',
            'harga' => 18500,
            'stok' => 8,            'gambar' => 'minyak.webp',        ],
        [
            'nama_produk' => 'Telur Ayam 1kg',
            'sku' => 'TLR001',
            'harga' => 23000,
            'stok' => 20,
            'gambar' => 'telur.webp',
        ],
        [
            'nama_produk' => 'Garam',
            'sku' => 'GRM001',
            'harga' => 2000,
            'stok' => 10,
            'gambar' => 'garam.webp',
        ],
        [
            'nama_produk' => 'Tepung Terigu 1kg',
            'sku' => 'TPG001',
            'harga' => 11500,
            'stok' => 20,
            'gambar' => 'tepung.webp',
        ],
        [
            'nama_produk' => 'Susu UHT 1L',
            'sku' => 'SSU001',
            'harga' => 13000,
            'stok' => 15,
            'gambar' => 'susu.webp',
        ],
    ];

    return view('daftar_produk', [
        'barang' => $barang
    ]);
});