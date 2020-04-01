<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class BlogPosts extends Model
{
    protected $table = 'blog_posts';
    public function category() {
        return $this->belongsTo('App\Category');
    }

    public function tags() {
        return $this->belongsToMany('App\Tag');
    }

    public function path() {
        return url("/post/{$this->id}-".Str::slug($this->title));
    }
}
