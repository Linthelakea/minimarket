<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function admin()
    {
        $products = \Illuminate\Support\Facades\Schema::hasTable('products') ? Product::all() : collect([]);
        $totalUsers = \Illuminate\Support\Facades\Schema::hasTable('users') ? User::count() : 0;
        $totalProducts = $products->count();
        return view('admin.dashboard', compact('products', 'totalUsers', 'totalProducts'));
    }

    public function kasir()
    {
        $products = \Illuminate\Support\Facades\Schema::hasTable('products') ? Product::all() : collect([]);
        return view('kasir.dashboard', compact('products'));
    }
}