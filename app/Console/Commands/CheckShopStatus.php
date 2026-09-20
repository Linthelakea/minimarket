<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class CheckShopStatus extends Command
{
    /**
     * Nama dan argumen perintah yang dipanggil di terminal.
     * Kita tambahkan argumen opsional {jam?} untuk mengecek status berdasarkan jam.
     */
    protected $signature = 'pos:status {jam?}';

    /**
     * Deskripsi perintah saat dilihat melalui 'php artisan list'.
     */
    protected $description = 'Mengecek status operasional Toko Kelontong POS';

    /**
     * Logika utama yang dijalankan oleh perintah.
     */
    public function handle()
    {

        $jam = $this->argument('jam') ?? 10;
        $nama = $this->ask("Masukkan nama kasir: ");
        $this->info("=== SISTEM MONITORING TOKO KELONTONG ===");

        if ($jam >= 8 && $jam <= 21) {
            $this->info("Halo $nama, selamat datang di Toko Kelontong POS!");
            $this->info("Status Toko pada jam $jam:00 WIB adalah: BUKA");
            $this->comment("Silakan kasir bersiap di meja transaksi.");
        } else {
            $this->info("Halo $nama, selamat datang di Toko Kelontong POS!");
            $this->error("Status Toko pada jam $jam:00 WIB adalah: TUTUP");
            $this->warn("Akses transaksi kasir dinonaktifkan sementara.");
        }
    }
}