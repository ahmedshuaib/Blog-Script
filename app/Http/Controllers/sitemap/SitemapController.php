<?php

namespace App\Http\Controllers\sitemap;

use App\BlogPosts;
use App\Category;
use App\Firmware;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pages;
use App\Tag;
use Carbon\Carbon;

class SitemapController extends Controller
{


    public function index() {

        $time = Carbon::now();

        return response()->view('sitemap.index', [
            'time' => $time
        ])->header('Content-type', 'text/xml');
    }

    public function tags() {
        $tags = Tag::orderby('created_at', 'desc')->get();

        return response()->view('sitemap.tags', [
            'tags' => $tags
        ])->header('Content-type', 'text/xml');
    }

    public function category() {

        $category = Category::orderby('created_at', 'desc')->get();

        return response()->view('sitemap.category', [
            'categories' => $category
        ])->header('Content-type', 'text/xml');

    }

    public function firmware() {
        $firmware = Firmware::orderby('created_at', 'desc')->get();

        return response()->view('sitemap.firmware', [
            'files' => $firmware
        ])->header('Content-type', 'text/xml');
    }

    public function posts() {

        $posts = BlogPosts::orderby('created_at', 'desc')->get();

        return response()->view('sitemap.posts', [
            'posts' => $posts
        ])->header('Content-type', 'text/xml');

    }

    public function pages() {
        $pages = Pages::orderby('created_at', 'desc')->get();

        return response()->view('sitemap.pages', [
            'pages' => $pages
        ])->header('Content-type', 'text/xml');
    }


}
