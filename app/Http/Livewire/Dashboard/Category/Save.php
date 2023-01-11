<?php

namespace App\Http\Livewire\Dashboard\Category;

use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Livewire\WithFileUploads;


class Save extends Component
{
    use WithFileUploads;

    public $title;
    public $text;
    public $image;
    public $category;

    protected $rules=[
      'title' => 'required|min:2|max:255',
      'text' => 'nullable',
      'image' => 'nullable|image|max:1024'
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
            $this->category = Category::create(
                [
                    'title' => $this->title,
                    'slug' => str($this->title)->slug(),
                    'text' => $this->text,
                ]
            );
            $this->emit("created");
        }
        //upload
        if($this->image){
            $imageName = $this->category->slug . '.'. $this->image->getClientOriginalExtension();
            $this->image->storeAs('images/category/', $imageName, 'public_upload');
            $this->category->update([
                'image'=> $imageName
            ]);
        }
    }
}
