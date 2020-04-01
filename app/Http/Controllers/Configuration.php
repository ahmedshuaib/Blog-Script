<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Pages;
use App\BlogPosts;
use App\Firmware;
use App\SystemOptions;
use Illuminate\Support\Facades\DB;

class Configuration extends Controller
{
    public $categories;
    public $pages;
    public $recent_posts;
    public $recent_firmwares;
    public $nav_categories;
    public $file_views;
    public $default;
    public function __construct()
    {
        $this->nav_categories = Category::where('parent_id', null)->with(['children', 'parent'])->get();
        $this->categories = Category::all();
        $this->pages      = Pages::where('is_publish', true)->get();
        $this->recent_posts = BlogPosts::orderby('created_at', 'desc')->where('is_publish', true)->take(5)->get();
        $this->recent_firmwares = Firmware::orderby('created_at', 'desc')->where('is_publish', true)->take(5)->get();
        $this->file_views   =  Firmware::join("file_views", "file_views.file_id", "=", "firmware.id")->where('is_publish', true)
            ->groupBy("firmware.id")
            ->orderBy(DB::raw('COUNT(firmware.id)'), 'desc')
            ->take(5)->get(array(DB::raw('COUNT(firmware.id) as total_views'), 'firmware.*'));
        $this->default = SystemOptions::first();
        view()->share('categories', $this->categories);
        view()->share('pages', $this->pages);
        view()->share('recent_posts', $this->recent_posts);
        view()->share('recent_firmwares', $this->recent_firmwares);
        view()->share('nav_categories', $this->nav_categories);
        view()->share('file_views', $this->file_views);
        view()->share('default', $this->default);
    }
}
