<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class ShowCategory extends Component
{
    use WithPagination;

    public $search;
    public $pagination = 2;
    public $sort = 'name';

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.category.show-category', [
            'data' => Category::where('name', 'like', '%' .$this->search. '%')
                                ->orderBy($this->sort, 'DESC')
                                ->paginate($this->pagination),
        ]);
    }
}
