<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
 // Menampilkan daftar produk
 public function index()
 {
 $kategori = "Elektronik";
 $daftarProduk = [
 ['id' => 1, 'nama' => 'Laptop ThinkPad', 'harga' => 12500000],
 ['id' => 2, 'nama' => 'Mouse Wireless', 'harga' => 250000],
 ['id' => 3, 'nama' => 'Mechanical Keyboard', 'harga' => 850000],
 ];
 return view('produk.index', compact('kategori', 'daftarProduk'));
 }
 // Menampilkan detail produk berdasarkan parameter ID
 public function show($id)
 {
 return view('produk.index', ['id' => $id]);
 }

 public function create()
 {
     return view('produk.index');
 }

 public function store(Request $request)
 {
     return redirect('/produk');
 }

 public function edit($id)
 {
     return view('produk.index', ['id' => $id]);
 }

 public function update(Request $request, $id)
 {
     return redirect('/produk');
 }

 public function destroy($id)
 {
     return redirect('/produk');
 }
}
