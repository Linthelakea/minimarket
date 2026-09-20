<?php

namespace App\Http\Controllers;

class LaporanController extends Controller
{
    public function __invoke()
    {
        $laporan = [
            'total_transaksi' => 25,
            'total_produk' => 75,
            'total_pendapatan' => 15000000,
        ];

        return view('produk.laporan', compact('laporan'));
    }
}