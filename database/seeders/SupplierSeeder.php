<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */


    public function run(): void
    {
        DB::table('suppliers')->insert([
            [
                'name' => 'PT. Indofood Sukses Makmur Tbk',
                'phone' => '021-5551234',
                'address' => 'Jl. Jend. Sudirman, Jakarta Selatan'
            ],
            [
                'name' => 'PT. Unilever Indonesia Tbk',
                'phone' => '021-5555678',
                'address' => 'Jl. BSD Boulevard Barat, Tangerang'
            ],
            [
                'name' => 'PT. Nestlé Indonesia',
                'phone' => '021-8088100',
                'address' => 'Jl. Letjen TB Simatupang, Jakarta Selatan'
            ],
        ]);
    }
}