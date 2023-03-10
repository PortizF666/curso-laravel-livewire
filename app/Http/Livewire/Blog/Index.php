<?php

namespace App\Http\Livewire\Blog;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use App\Models\Post;

class Index extends Component
{
     use WithPagination;
    
    public $confirmingDeletePost = false;
    public $postToDelete;

    //filters
    public $type;
    public $category_id;
    public $posted;

    //search
    public $search;

    //date
    public $from;
    public $to;

    //Uso de queryString
    protected $queryString = ['type', 'posted', 'category_id', 'search', 'from', 'to'];

    public function render()
    {
        $post = Post::where("posted", 'yes');

        if($this->search){
            $post->where(function($query){
                $query->orwhere('id', 'like', '%'.$this->search.'%')
                ->orWhere('title', 'like', '%'.$this->search.'%');
            });
        }
        if($this->from && $this->to){
            $post->whereBetween('date',[date($this->from), date($this->to)]);
        }
        if($this->type){
            $post->where('type', $this->type);
        }
        if($this->category_id){
            $post->where('category_id', $this->category_id);
        }
        if($this->posted){
            $post->where('posted', $this->posted);
        }
        $categories = Category::pluck('title','id');
        $post = $post->paginate(10);
        return view('livewire.blog.index', compact('post', 'categories'))->layout('layouts.web');
    }

    public function selectedPostToDelete(Post $post){
        $this->confirmingDeletePost = true;
        $this->postToDelete = $post;
    }
}


