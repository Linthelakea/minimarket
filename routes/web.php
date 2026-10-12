<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

// Group Auth (Semua user yang sudah login)
Route::middleware(['auth'])->group(function () {

    // Route Profile bawaan Breeze
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Khusus Admin (Hanya Admin yang bisa akses)
    Route::middleware(['cek.role:admin'])->group(function () {
        Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
        
        // Modul Products, Categories, Users, Reports
        Route::resource('/admin/product', ProdukController::class)->names('product');
        // Route::resource('/admin/category', CategoryController::class);
        // Route::resource('/admin/user', UserController::class);
        // Route::get('/admin/reports', [ReportController::class, 'index'])->name('reports.index');
    });

    // Khusus Kasir (Hanya Kasir yang bisa akses)
    Route::middleware(['cek.role:kasir'])->group(function () {
        Route::get('/kasir/dashboard', [DashboardController::class, 'kasir'])->name('kasir.dashboard');
    });

    // Admin + Kasir (Bisa diakses oleh keduanya)
    Route::middleware(['cek.role:admin,kasir'])->group(function () {
        // Modul Transaksi / Transactions
        // Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
        // Route::get('/transactions/create', [TransactionController::class, 'create'])->name('transactions.create');
        // Route::post('/transactions', [TransactionController::class, 'store'])->name('transactions.store');
    });

});

// PENTING: Memuat semua route auth milik Breeze (termasuk /login, /register, /logout)
require __DIR__.'/auth.php';