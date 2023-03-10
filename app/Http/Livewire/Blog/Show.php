<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use App\Models\Post;

class Show extends Component
{
    public $post;

    public function mount($slug){
        $this->post = Post::where('slug', $slug)->first();
    }
    public function render()
    {
        return view('livewire.blog.show')->layout('layouts.web');
    }
}
