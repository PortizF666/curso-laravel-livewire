<?php

namespace App\Http\Livewire\Dashboard\Post;

use Livewire\Component;
use App\Models\Post;
use App\Models\Category;
use Livewire\WithFileUploads;

class Save extends Component
{
    use WithFileUploads;

    public $title;
    public $date;
    public $text;
    public $description;
    public $posted;
    public $type;
    public $category_id;
    public $image;
    public $post;

    protected $rules=[
      'title' => 'required|min:2|max:255',
      'description' => 'required|min:2|max:255',
      'date' => 'required',
      'type' => 'required',
      'category_id' => 'required',
      'posted' => 'required',
      'text' => 'required|nullable|max:5000',
      'image' => 'nullable|image|max:1024'
    ];

    public function mount($id = null)
    {
        if($id != null){
            $this->post = Post::findOrFail($id);
            $this->title = $this->post->title;
            $this->description = $this->post->description;
            $this->date = $this->post->date;
            $this->type = $this->post->type;
            $this->category_id = $this->post->category_id;
            $this->posted = $this->post->posted;
            $this->text = $this->post->text;
            
        }
    }

    public function render()
    {
        $categories = Category::get();
        return view('livewire.dashboard.post.save', compact('categories'));
    }

    public function submit()
    {
        $this->validate();
        if($this->post){
            $this->post->update([
                'title' => $this->title,
                'description' => $this->description,
                'date' => $this->date,
                'type' => $this->type,
                'category_id' => $this->category_id,
                'posted' => $this->posted,
                'text' => $this->text,
    
            ]);
            $this->emit("updated");
        }else{
            $this->post = Post::create(
                [
                    'title' => $this->title,
                    'slug' => str($this->title)->slug(),
                    'description' => $this->description,
                    'date' => $this->date,
                    'type' => $this->type,
                    'category_id' => $this->category_id,
                    'posted' => $this->posted,
                    'text' => $this->text,
                    //'tags' => $array(), //hay una tabla llamada taggables que une, tags con post
                ]
            );
            $this->emit("created");
        }
        //upload
        if($this->image){
            $imageName = $this->post->slug . '.'. $this->image->getClientOriginalExtension();
            $this->image->storeAs('images/post/', $imageName, 'public_upload');
            $this->post->update([
                'image'=> $imageName
            ]);
        }
    }
}
