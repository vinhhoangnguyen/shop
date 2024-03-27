<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use App\Models\Category;
// use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithMapping;


class CategoriesImport implements ToModel, WithHeadingRow, WithMapping
{
    public function mapping(): array
    {
        return [
            'Tên danh mục' => 'name',
            'Hình' => 'image',
            'Trạng thái' => 'status',
            // 'Tạo bởi' => 'created_by',
            // 'Cập nhật bởi' => 'updated_by',
            // Các cột khác...
        ];
    }

    public function model(array $row)
    {
        return new User([
            'name' => $row['name'],
            'image' => $row['image'],
            'status' => $row['status'],
            // 'created_by' => $row['created_by'],
            // 'updated_by' => $row['updated_by'],
        ]);
    }
}
