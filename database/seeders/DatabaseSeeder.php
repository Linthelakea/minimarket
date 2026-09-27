<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\ProductSeeder;
use Database\Seeders\CategorySeeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Menjalankan CategorySeeder terlebih dahulu
        // 2. Kemudian menjalankan ProductSeeder
        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            SupplierSeeder::class,
        ]);

        // 3. Membuat satu user untuk testing
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

         // Users
        $johnId = DB::table('users')->insertGetId([
            'name' => 'John Doe',
            'email' => 'johndoe@example.com',
            'password' => Hash::make('password123'),
            'status' => 'active',
            'role' => 'admin',
            'age' => 25,
            'points' => 100,
        ]);

        $janeId = DB::table('users')->insertGetId([
            'name' => 'Jane Doe',
            'email' => 'janedoe@example.com',
            'password' => Hash::make('password123'),
            'status' => 'active',
            'role' => 'user',
            'age' => 20,
            'points' => 50,
        ]);

        $aliId = DB::table('users')->insertGetId([
            'name' => 'Ali',
            'email' => 'ali@example.com',
            'password' => Hash::make('password123'),
            'status' => 'inactive',
            'role' => 'user',
            'age' => 17,
            'points' => 30,
        ]);

        // Orders
        DB::table('orders')->insert([
            [
                'user_id' => $johnId,
                'total_price' => 150000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $johnId,
                'total_price' => 200000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => $janeId,
                'total_price' => 100000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // Employees
        DB::table('employees')->insert([
            [
                'name' => 'Budi',
                'salary' => 5000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Citra',
                'salary' => 7000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Deni',
                'salary' => 6000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}