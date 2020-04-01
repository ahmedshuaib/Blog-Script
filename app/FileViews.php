<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class FileViews extends Model
{
    protected  $table = 'file_views';

    public static function createViewLog($file) {
        $views = new FileViews();
        $views->file_id = $file->id;
        $views->title_slug = $file->title;
        $views->url     = \Request::url();
        $views->session_id = \Request::getSession()->getId();
        $views->ip = \Request::getClientIp();
        $views->agent = \Request::header('User-Agent');
        $views->save();
    }
}
