<?php

namespace App\Livewire\Category;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;

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


    #[On('item-created')]

    public function refresh(){
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

    public function deleteMultiID(){
        $this->dispatch('items-multiDelete', ['items' =>$this->selectedIDs ]);
    }

    public function switchMultiID(){
        $this->dispatch('items-multiSwitch', ['items' =>$this->selectedIDs ]);
    }

    #[On('confirmed-multiDelete')]
    public function confirm_deleteMultiID($array_items){
        // Category::whereIn('id', $array_items)->delete();
        foreach ($array_items as $category) {
            $item = Category::findOrFail($category);
            if ($item->image) {
                unlink($item->image);
            }
            $item->delete();
        }
        $this->selectedIDs = [];
        $this->dispatch('items-deleted');
    }

    #[On('confirmed-multiSwitch')]
    public function confirm_switchMultiID($array_items){
        // Category::whereIn('id', $array_items)->delete();
        foreach ($array_items as $category) {
            $item = Category::findOrFail($category);
            $item->status = ($item->status == 1) ? 0 : 1;
            $item->save();
        }
        $this->selectedIDs = [];
        
        $this->dispatch('items-switched');
    }

    // #[On('items-deleted')]
    public function render()
    {
        $categories = $this->category;
        return view('livewire.category.show-category', [
            'data' => $categories
        ]);

    }
}
