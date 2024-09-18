<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usersData = [
            [
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin002'),
                'role' => 'admin',
                'image' => ''
            ],
            [
                'name' => 'user',
                'email' => 'user@gmail.com',
                'password' => bcrypt('user002'),
                'image' => ''
            ]
        ];

        foreach ($usersData as $user) {
            $total = User::where('email', $user['email'])->count();
            if ($total == 0) {
                User::create($user);
            }
        }
    }
}
