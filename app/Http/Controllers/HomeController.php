<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPosts;
use App\Category;
use App\Pages;
use App\Firmware;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::orderby('created_at', 'desc')->take(5)->get();
        $blog_posts = BlogPosts::orderby('created_at', 'desc')->take(5)->get();
        $pages = Pages::all();
        $firmware = Firmware::orderby('created_at', 'desc')->get();
        return view('dashboard.home')->with([
            'categories'    => $categories,
            'blog_posts'    => $blog_posts,
            'pages'         => $pages,
            'firmware'      => $firmware
        ]);
    }
}
