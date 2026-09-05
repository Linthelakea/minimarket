<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\product; // Pastikan model product di-import

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        product::create([
            'name' => 'Beras 5kg',
            'price' => 65000,
            'stock' => 10,
        ]);

        product::create([
            'name' => 'Minyak Goreng 1L',
            'price' => 18000,
            'stock' => 25,
        ]);
    }
}