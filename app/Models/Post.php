<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;

class Post extends Model
{
    use HasFactory;

    protected $fillable=['title', 'slug', 'date', 'image', 'text', 'description', 'posted', 'type', 'category_id'];

    protected $casts = [
        'date' =>'datetime'
    ];
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function tags(){
        return $this->morphToMany(Tag::class, 'taggbales');
    }

    public function getImageURL(){
        if($this->image==null){
            return URL::asset('app/public/images/post/image.jpg');
        }else{
            return URL::asset('app/public/images/post/'.$this->image);
        }
        
    }
}
