<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Save extends Component
{
    public $title;
    public $text;
    public $category;

    protected $rules=[
      'title' => 'required|min:2|max:255',
      'text' => 'nullable'
    ];

    public function mount($id = null)
    {
        if($id != null){
            $this->category = Category::findOrFail($id);
            $this->title = $this->category->title;
            $this->text = $this->category->text;
        }
    }

    public function render()
    {
        return view('livewire.dashboard.category.save');
    }
    public function submit()
    {
        $this->validate();
        if($this->category){
            $this->category->update([
                'title' => $this->title,
                'text' => $this->text,
            ]);
            $this->emit("updated");
        }else{
            Category::create(
                [
                    'title' => $this->title,
                    'slug' => str($this->title)->slug(),
                    'text' => $this->text,
                ]
            );
            $this->emit("created");
        }
    }
}
