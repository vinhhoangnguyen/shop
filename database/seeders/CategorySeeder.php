<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Category 1',
            'slug' => Str::slug('Category 1'),
            'image' => 'backend/upload/pos/category/category1-image.jpg',
            'status' => true,
            'created_by' => 'admin',
            'updated_by' => 'admin',
        ]);

        Category::create([
            'name' => 'Category 2',
            'slug' => Str::slug('Category 2'),
            'image' => 'backend/upload/pos/category/category2-image.jpg',
            'status' => true,
            'created_by' => 'admin',
            'updated_by' => 'admin',
        ]);

        Category::create([
            'name' => 'Category 3',
            'slug' => Str::slug('Category 3'),
            'image' => 'backend/upload/pos/category/category3-image.jpg',
            'status' => true,
            'created_by' => 'admin',
            'updated_by' => 'admin',
        ]);

    }
}
