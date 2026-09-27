<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserController extends Controller
{
    // Eloquent ORM
    // CREATE
    public function create()
    {
        $user = User::create([
            'name' => 'John Doe',
            'email' => 'johndoe2@example.com',
            'password' => 'password123',
        ]);

        return response()->json($user);
    }

    // RETRIEVE
    public function retrieve()
    {
        $users = User::all();

        return response()->json($users);
    }

    //UPDATE
    public function update()
    {
        $user = User::where(
            'email',
            'johndoe2@example.com'
    )->first();

    if (!$user) {
        return 'User tidak ditemukan';
    }

    $user->update([
        'name' => 'John Updated',
    ]);

    return response()->json($user);
    }

    //DELETE
    public function delete()
    {
        $user = User::where(
            'email',
            'johndoe2@example.com'
        )->first();

        if (!$user) {
            return 'User tidak ditemukan';
        }

        $user->delete();

        return 'User berhasil dihapus';
    }

    //QUERY     
    // 1. INSERT

    public function insert()
    {
        DB::table('users')->insert([
            'name' => 'John Doe',
            'email' => 'newjohn@example.com',
            'password' => bcrypt('password123'),
            'status' => 'active',
            'role' => 'user',
            'age' => 22,
            'points' => 0,
        ]);

        return 'Data berhasil ditambahkan!';
    }

    public function insertGetId()
    {
        $id = DB::table('users')->insertGetId([
            'name' => 'New Jane',
            'email' => 'newjane@example.com',
            'password' => bcrypt('password123'),
            'status' => 'active',
            'role' => 'user',
            'age' => 21,
            'points' => 0,
        ]);

        return 'Data berhasil ditambahkan. ID: ' . $id;
    }

    // 2. MENGAMBIL DATA

    public function getUsers()
    {
        $users = DB::table('users')->get();

        return view('query.index', compact('users'));
    }

    public function findUser()
    {
        $user = DB::table('users')
            ->where('email', 'johndoe@example.com')
            ->first();

        return response()->json($user);
    }

    public function selectUser()
    {
        $users = DB::table('users')
            ->select('id', 'name')
            ->get();

        return response()->json($users);
    }

    public function multipleWhere()
    {
        $users = DB::table('users')
            ->where('status', 'active')
            ->where('role', 'admin')
            ->get();

        return response()->json($users);
    }

    public function whereOperator()
    {
        $users = DB::table('users')
            ->where('age', '>=', 18)
            ->get();

        return response()->json($users);
    }

    // 3. UPDATE

    public function updateUser()
    {
        DB::table('users')
            ->where('email', 'johndoe@example.com')
            ->update([
                'status' => 'inactive'
            ]);

        return 'Status user berhasil diperbarui!';
    }

    // Increment
    public function incrementPoints()
    {
        DB::table('users')
            ->where('id', 1)
            ->increment('points', 10);

        return 'Points bertambah 10!';
    }

    // Decrement
    public function decrementPoints()
    {
        DB::table('users')
            ->where('id', 1)
            ->decrement('points', 5);

        return 'Points berkurang 5!';
    }

    // 4. DELETE

    public function deleteUser()
    {
        DB::table('users')
            ->where('email', 'newjohn@example.com')
            ->delete();

        return 'User berhasil dihapus!';
    }

    // Hapus semua data
    public function truncateUsers()
    {
        DB::table('users')->truncate();

        return 'Semua data users berhasil dihapus!';
    }

    // 5. PLUCK

    public function pluckUsers()
    {
        $names = DB::table('users')
            ->pluck('name');

        return response()->json($names);
    }

    // 6. AGGREGATE

    public function countUsers()
    {
        $totalUsers = DB::table('users')->count();

        return 'Jumlah user: ' . $totalUsers;
    }

    public function sumPoints()
    {
        $totalPoints = DB::table('users')
            ->sum('points');

        return 'Total points: ' . $totalPoints;
    }

    public function averageAge()
    {
        $averageAge = DB::table('users')
            ->avg('age');

        return 'Rata-rata umur: ' . $averageAge;
    }

    public function maxSalary()
    {
        $maxSalary = DB::table('employees')
            ->max('salary');

        return 'Gaji terbesar: ' . $maxSalary;
    }

    public function minSalary()
    {
        $minSalary = DB::table('employees')
            ->min('salary');

        return 'Gaji terkecil: ' . $minSalary;
    }

    // 7. JOIN

    public function innerJoin()
    {
        $users = DB::table('users')
            ->join(
                'orders',
                'users.id',
                '=',
                'orders.user_id'
            )
            ->select(
                'users.name',
                'orders.total_price'
            )
            ->get();

        return response()->json($users);
    }

    public function leftJoin()
    {
        $users = DB::table('users')
            ->leftJoin(
                'orders',
                'users.id',
                '=',
                'orders.user_id'
            )
            ->select(
                'users.name',
                'orders.total_price'
            )
            ->get();

        return response()->json($users);
    }

    // 8. ORDER BY, LIMIT, OFFSET

    public function orderUsers()
    {
        $users = DB::table('users')
            ->orderBy('name', 'asc')
            ->get();

        return response()->json($users);
    }

    public function limitUsers()
    {
        $users = DB::table('users')
            ->limit(2)
            ->get();

        return response()->json($users);
    }

    public function offsetUsers()
    {
        $users = DB::table('users')
            ->offset(1)
            ->limit(2)
            ->get();

        return response()->json($users);
    }

    // 9. SUBQUERY

    public function subquery()
    {
        $users = DB::table('users')
            ->select('name')
            ->selectSub(function ($query) {
                $query->from('orders')
                    ->selectRaw('count(*)')
                    ->whereColumn(
                        'orders.user_id',
                        'users.id'
                    );
            }, 'order_count')
            ->get();

        return response()->json($users);
    }

    // 10. RAW SQL

    public function rawSelect()
    {
        $users = DB::table('users')
            ->selectRaw(
                'COUNT(*) as total_users, status'
            )
            ->groupBy('status')
            ->get();

        return response()->json($users);
    }

    public function rawWhere()
    {
        $users = DB::table('users')
            ->whereRaw(
                'age > ? AND status = ?',
                [18, 'active']
            )
            ->get();

        return response()->json($users);
    }
}