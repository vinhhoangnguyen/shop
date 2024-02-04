<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    public $search;
    public $pagination = 2;
    public $sort = 'name';

    public function render()
    {
        // sleep(5);
        return view('livewire.categories', [
            'data' => Category::where('name', 'like', '%' .$this->search. '%')
                                ->orderBy($this->sort, 'DESC')
                                ->paginate($this->pagination),
        ]);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
