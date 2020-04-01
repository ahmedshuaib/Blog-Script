<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Pages extends Model
{
    //

    public function path() {
        return url("/page/{$this->id}-". Str::slug($this->title));
    }
}
