<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    public $search;
    public $pagination = 5;
    public $sort = 'name';

    public function render()
    {
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
