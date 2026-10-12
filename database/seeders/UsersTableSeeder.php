<?php 

namespace Database\Seeders; 

use Illuminate\Database\Seeder; 
use App\Models\User;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder 
{ 
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => '12345',
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'kasir',
            'email' => 'kasir@gmail.com',
            'password' => '54321',
            'role' => 'kasir',
        ]);
    }
 } 