<?php

namespace App\Livewire\Category;

use App\Models\Category;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Computed;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

class UploadCategory extends Component
{
    use WithFileUploads;
    use WithPagination; // Sử dụng WithPagination

    #[Validate('required')] 
    public $fileExcel;
    
    // }
    public function uploadFile()
    {
        if ($this->fileExcel) {
            $arrayUploadFile = Excel::toArray([], $this->fileExcel);

        // Kiểm tra xem dữ liệu từ file Excel có tồn tại không
            if (!empty($arrayUploadFile[0])) {
            // Kiểm tra xem bảng tạm đã tồn tại chưa
                $tableExists = DB::select("SHOW TABLES LIKE 'temp_table'");
                
                // Nếu bảng tạm chưa tồn tại, thì mới tạo mới và chèn dữ liệu vào
                if (empty($tableExists)) {
                    // Xây dựng truy vấn tạo bảng và chèn dữ liệu
                    $query = "CREATE TEMPORARY TABLE temp_table (";
                    $columns = $arrayUploadFile[0][0];
                    $query .= implode(' VARCHAR(255), ', $columns) . ' VARCHAR(255))';
                    
                    // Thực thi truy vấn tạo bảng
                    try {
                        DB::statement($query);
                    } catch (\Exception $e) {
                        return [];
                    }

                    // Chèn dữ liệu vào bảng tạm
                    foreach ($arrayUploadFile[0] as $key => $row) {
                        if ($key > 0) {
                            $insertQuery = "INSERT INTO temp_table (";
                            $insertQuery .= implode(', ', $columns) . ') VALUES (';
                            $insertQuery .= '"' . implode('", "', $row) . '")';
                            
                            // Thực thi truy vấn chèn dữ liệu
                            try {
                                DB::statement($insertQuery);
                            } catch (\Exception $e) {
                                return [];
                            }
                        }
                    }
                }

                // Thực hiện truy vấn SQL để lấy dữ liệu từ bảng tạm và phân trang
                $tempTableData = DB::table('temp_table')->paginate(10); 
            
                // Trả về dữ liệu được phân trang
                // dd($tempTableData);
                return $tempTableData;
            }
        }

        // Trả về mảng rỗng nếu không có dữ liệu hoặc có lỗi xảy ra
        return [];
    }


    public function render()
    {
        $data = $this->uploadFile();
        return view('livewire.category.upload-category', [
                // 'data' => Category::paginate(10)
                'data' => $data
        ]);
    }
}
