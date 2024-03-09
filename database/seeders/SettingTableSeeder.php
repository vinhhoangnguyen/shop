<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\setting;

class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Setting::create([
            'name'=> 'My shop',
            'slug'=> 'my-shop',
            'logo'=> 'logo.jpg',
            'address'=> '999, Street HTP',
            'phone'=> 'my number',
            'hot_line'=> 'hot number',
            'account'=> 'my account',
            'email'=> 'myshop@gmail.com',
            'time'=> 'Sáng: 8h - 12h, Chiều: 14h - 19h',

        ]);

    }
}
