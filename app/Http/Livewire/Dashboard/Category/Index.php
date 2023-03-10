<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    
    public $confirmingDeleteCategory = false;
    public $categoryToDelete;

    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.dashboard.category.index', compact('categories'));
    }

    public function selectedCategoryToDelete(Category $category){
        $this->confirmingDeleteCategory = true;
        $this->categoryToDelete = $category;
    }

    public function delete(Category $category){
        $this->emit("deleted");
        $this->confirmingDeleteCategory = false;
        $this->categoryToDelete->delete();
    }
}
