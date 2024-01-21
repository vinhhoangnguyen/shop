<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $usersData = [
            [
                'name' => 'vinh hoàng',
                'slug' => 'vinh-hoang',
                'email' => 'admin@gmail.com',
                'address' => '111 Main Street',
                'phone' => '11111111',
                'role' => 'admin',
                'photo' => 'profile.jpg',
                'password' => bcrypt('password123'),
                'status' => true,
            ],
            [
                'name' => 'quản lý',
                'slug' => 'quan-ly',
                'email' => 'manager@gmail.com',
                'address' => '222 Main Street',
                'phone' => '22222222',
                'role' => 'manager',
                'photo' => 'profile1.jpg',
                'password' => bcrypt('password123'),
                'status' => true,
            ],
            [
                'name' => 'bán hàng',
                'slug' => 'ban-hang',
                'email' => 'saler@gmail.com',
                'address' => '333 Main Street',
                'phone' => '33333333',
                'role' => 'saler',
                'photo' => 'profile2.jpg',
                'password' => bcrypt('password123'),
                'status' => true,
            ],
            [
                'name' => 'khách hàng',
                'slug' => 'khach-hang',
                'email' => 'user@gmail.com',
                'address' => '444 Main Street',
                'phone' => '44444444',
                'role' => 'customer',
                'photo' => 'profile3.jpg',
                'password' => bcrypt('password123'),
                'status' => true,
            ]
        ];

        foreach ($usersData as $user) {
            User::create([
                'name' => $user['name'],
                'slug' => $user['slug'],
                'email' => $user['email'],
                'address' => $user['address'],
                'phone' => $user['phone'],
                'role' => $user['role'],
                'photo' => $user['photo'],
                'password' => $user['password'],
                'status' => $user['status']
            ]);
        }

    }
}
