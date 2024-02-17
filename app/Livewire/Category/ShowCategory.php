<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ShowCategory extends Component
{
    use WithPagination;

    public $search='';
    public $perPage = 10;
    public $sortColumn = 'id';

    public $sortDirect = 'desc';

    public $selectedIds = [];

    //Lifecycle Hook
    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function doSort($column){
        if ($this->sortColumn === $column) {
            $this->sortDirect = ($this->sortDirect === 'desc') ? 'asc' : 'desc';
            return;
        }

        $this->sortColumn = $column;
        $this->sortDirect = 'desc';
    }

    public function render()
    {
        return view('livewire.category.show-category', [
            'data' => Category::search($this->search)
                            ->orderBy($this->sortColumn, $this->sortDirect)
                            ->paginate($this->perPage),
        ]);

    }
}
