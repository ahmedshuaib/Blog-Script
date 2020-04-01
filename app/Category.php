<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    protected $table = 'categories';

    public function parent() {
        return $this->belongsTo('App\Category', 'parent_id');
    }

    public function children() {
        return $this->hasMany('App\Category', 'parent_id');
    }

    public function posts() {
        return $this->hasMany('App\BlogPosts');
    }

    public function files() {
        return $this->hasMany('App\Firmware');
    }

    public function path() {
        return url("/category/{$this->id}-". Str::slug($this->title));
    }
}
