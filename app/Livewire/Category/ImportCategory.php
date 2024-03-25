<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;

use App\Exports\CategoriesExport;
use App\Imports\CategoriesImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Collection;


use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;

class ImportCategory extends Component
{
    use WithPagination;
    use WithFileUploads;

    #[Validate('required', message: 'Vui lòng chọn file excel để cập nhật.')]
    #[Validate('Mimes:xls,xlsx', message: 'Vui lòng chọn file excel để cập nhật.')]
    public $fileViewImport;

    public $iteration;
    public $arrayImport = [];
    public $isViewContent = false;


    public function uploadFile(){
        $this->validate();

        $this->arrayImport = Excel::toArray([], $this->fileViewImport);
        $this->isViewContent = true;

       // dd($this->arrayImport);
    }

    public function updateFile(){
        $this->validate();
        Excel::import(new CategoriesImport, $this->fileViewImport);
        //Refesh Show Component
        $this->dispatch('item-imported')->to(ShowCategory::class);
        session()->flash('status', 'Cập nhật thành công từ file Excel.');
    }



    public function close(){
        $this->reset('fileViewImport');
        $this->resetValidation();
        $this->fileViewImport = null;
        $this->iteration++;
        $this->arrayImport = [];
        $this->isViewContent = false;
    }

    public function render()
    {
        return view('livewire.category.import-category');
    }
}
