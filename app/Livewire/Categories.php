<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

class Categories extends Component
{
    use WithPagination;

    public $search;

    public function render()
    {
        return view('livewire.categories', [
            'data' => Category::where('name', 'like', '%' .$this->search. '%')
                                ->orderBy('name', 'DESC')
                                ->paginate(2),
        ]);
    }
}
