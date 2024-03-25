<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
// use Maatwebsite\Excel\Concerns\WithMapping;

class CategoriesImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new Category([
            'name' => $row['name'] ?? $row['ten_danh_muc'],
            'slug' => isset($row['slug']) ? $row['slug'] : (Str::slug($row['ten_danh_muc'] ?? $row['name'] ?? ($row['name'] ? Str::slug($row['name']) : null))),
            'image' => $row['image'] ?? $row['logo'] ?? $row['hinh'],
            'created_by' => $row['created_by'] ?? $row['tao_boi'] ?? null,
            'updated_by' => $row['updated_by'] ?? $row['cap_nhat_boi'] ?? null,
            // Các trường khác...
        ]);
    }

    public function headingRow(): int
    {
        return 1;
    }




}
