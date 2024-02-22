<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;

class ShowCategory extends Component
{
    use WithPagination;

    public $search='';
    public $perPage = 10;
    public $sortColumn = 'id';

    public $sortDirect = 'desc';

    public $selectedIDs = [];
    public $selectPageRows = false;


    //Lifecycle Hook
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    //Checkbox SelectAll
    public function updatedSelectPageRows($value){
       if ($value) {
            $this->selectedIDs = $this->category->pluck('id')->map(function($id){
                return (String)$id;
            });
            
       }else{
            $this->selectedIDs = [];
    
       }    
    }

    public function updatedSelectedIDs($values){
        if (count($this->selectedIDs) < $this->perPage) {
            $this->selectPageRows = false;
        }
    }

    #[Computed]
    public function category()
    {
        return Category::search($this->search)
            ->orderBy($this->sortColumn, $this->sortDirect)
            ->paginate($this->perPage);
    }

    public function doSort($column){
        if ($this->sortColumn === $column) {
            $this->sortDirect = ($this->sortDirect === 'desc') ? 'asc' : 'desc';
            return;
        }
        $this->sortColumn = $column;
        $this->sortDirect = 'desc';
    }

    //Bulk Action: coming soon...
    public function deleteMultiID(){
        dd('Thao tác xoá: '.count($this->selectedIDs).' muc');
    }

    public function render()
    {
        $categories = $this->category;
        return view('livewire.category.show-category', [
            'data' => $categories
        ]);
    
    }
}
