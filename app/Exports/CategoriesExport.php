<?php

namespace App\Exports;

use App\Models\Category;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;

use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class CategoriesExport implements FromQuery, ShouldAutoSize, WithStrictNullComparison, WithHeadings,WithStyles
{
    use Exportable;
    protected $selectedMultiID;

    public function __construct($selectedMultiID = null)
    {
        if ($selectedMultiID == null) {
            $this->selectedMultiID = Category::pluck('id')->toArray();
        } else {
            $this->selectedMultiID = $selectedMultiID;
        }
    }
    
    public function query()
    {
        return Category::whereIn('id', $this->selectedMultiID);
        
        // $categories = Category::whereIn('id', $this->selectedMultiID)->get();
        
        // $numberedCategories = [];
        // foreach ($categories as $key => $category) {
        //     $numberedCategories[] = [
        //         '#' => $key + 1,
        //         'Mã' => $category->id,
        //         'Tên danh mục' => $category->name,
        //         'Slug danh mục' => $category->slug,
        //         'Hình ảnh' => $category->image,
        //         'Trạng thái' => $category->status,
        //         'Người tạo' => $category->created_by,
        //         'Người cập nhật' => $category->updated_by,
        //         'Thời gian tạo' => $category->created_at,
        //         'Thời gian cập nhật' => $category->updated_at,
        //     ];
        // }
       
        // return collect($numberedCategories);
    }

    public function headings(): array
    {
        return [
            'Mã',
            'Tên danh mục',
            'Slug danh mục',
            'Hình ảnh',
            'Trạng thái',
            'Người tạo',
            'Người cập nhật',
            'Thời gian tạo',
            'Thời gian cập nhật',
        ];
    }

    public function styles(Worksheet $sheet)
    {
        $styles = [];

        // Định dạng cho tiêu đề cột
        $styles[1] = [
            'font' => ['bold' => true, 'size' => 13], 
            'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
        ];

        // Định dạng cho nội dung các ô từ hàng thứ 2 trở đi
        for ($i = 2; $i <= $sheet->getHighestRow(); $i++) {
            $styles[$i] = [
                'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
            ];
        }

        return $styles;

    }
}
