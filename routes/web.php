<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ValidasiController;

Route::get('/validasi', function () {
    return view('validasi');
});

Route::get('/user/store', [UserController::class, 'store']);

Route::post('/validasi', [ValidasiController::class, 'submitForm']);

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

//Eloqunt ORM
Route::prefix('orm')->group(function () {

    // CREATE
    Route::get('/create', [UserController::class, 'create']);

    // RETRIEVE
    Route::get('/users', [UserController::class, 'retrieve']);

    // UPDATE
    Route::get('/update', [UserController::class, 'update']);

    // DELETE
    Route::get('/delete', [UserController::class, 'delete']);

});

//QUERY
Route::prefix('query')->group(function () {

    // INSERT
    Route::get('/insert', [UserController::class, 'insert']);
    Route::get('/insert-id', [UserController::class, 'insertGetId']);
    // READ
    Route::get('/users', [UserController::class, 'getUsers']);
    Route::get('/find', [UserController::class, 'findUser']);
    Route::get('/select', [UserController::class, 'selectUser']);
    Route::get('/multiple-where', [UserController::class, 'multipleWhere']);
    Route::get('/operator', [UserController::class, 'whereOperator']);
    // UPDATE
    Route::get('/update', [UserController::class, 'updateUser']);
    Route::get('/increment', [UserController::class, 'incrementPoints']);
    Route::get('/decrement', [UserController::class, 'decrementPoints']);
    // DELETE
    Route::get('/delete', [UserController::class, 'deleteUser']);
    Route::get('/truncate', [UserController::class, 'truncateUsers']);
    // PLUCK
    Route::get('/pluck', [UserController::class, 'pluckUsers']);
    // AGGREGATE
    Route::get('/count', [UserController::class, 'countUsers']);
    Route::get('/sum', [UserController::class, 'sumPoints']);
    Route::get('/avg', [UserController::class, 'averageAge']);
    Route::get('/max', [UserController::class, 'maxSalary']);
    Route::get('/min', [UserController::class, 'minSalary']);
    // JOIN
    Route::get('/join', [UserController::class, 'innerJoin']);
    Route::get('/left-join', [UserController::class, 'leftJoin']);
    // ORDER / LIMIT / OFFSET
    Route::get('/order', [UserController::class, 'orderUsers']);
    Route::get('/limit', [UserController::class, 'limitUsers']);
    Route::get('/offset', [UserController::class, 'offsetUsers']);
    // SUBQUERY
    Route::get('/subquery', [UserController::class, 'subquery']);
    // RAW SQL
    Route::get('/raw-select', [UserController::class, 'rawSelect']);
    Route::get('/raw-where', [UserController::class, 'rawWhere']);
});

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