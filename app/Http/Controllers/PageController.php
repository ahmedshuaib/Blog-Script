<?php

namespace App\Http\Controllers;
use App\BlogPosts;
use App\Category;
use App\Firmware;
use App\Pages;
use App\FileViews;
use App\SystemOptions;
use Illuminate\Http\Request;
use App\Http\Controllers\Configuration;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PageController extends Configuration
{

    public function __construct() {
        parent::__construct();
    }

    public function Index() {
        $posts = BlogPosts::orderby('created_at', 'desc')->where('is_publish', true)->paginate(3);
        $firmwares = Firmware::orderby('created_at', 'desc')->where('is_publish', true)->paginate(3);
        return view('index')->with([
            'posts' => $posts,
            'firmwares' => $firmwares
        ]);
    }

    public function Posts() {
        $posts = BlogPosts::orderby('created_at', 'desc')->where('is_publish', true)->paginate(15);
        return view('posts')->with([
            'posts' => $posts
        ]);
    }

    public function show_post($id, $slug) {
        $post = BlogPosts::findorfail($id);
        return view('show-post')->with(['post' => $post]);
    }

    public function Firmwares() {
        $firmwares = Firmware::orderby('created_at', 'desc')->where('is_publish', true)->paginate(15);
        return view('firmware')->with([
            'firmwares' => $firmwares
        ]);
    }

    public function show_firmware($id, $slug) {
        $firmware = Firmware::findorfail($id);
        FileViews::createViewLog($firmware);
        return view('show-firmware')->with(['firmware' => $firmware]);
    }

    public function Category($id, $slug) {
        $category = Category::findorfail($id);
        $files  = $category->files()->paginate(15);
        $posts  = $category->posts()->paginate(15);
        return view('category')->with([
            'cat'=> $slug,
            'category'    => $category,
            'files' => $files,
            'posts' => $posts
        ]);
    }

    public function Contact() {
        return view('contact');
    }


    public function SendEmail(Request $request) {

        $this->validate($request, [
           'email'  => 'required | email',
           'subject'    => 'required',
           'body'   => 'required',
           'name'   => 'required'
        ]);
        $config  = new Configuration;
        Mail::to($config->default->contact_email)->queue(new Contact($request->all()));
        return back()->with('success', 'Successfully your message has been send to our team. We will notify in 24 hours');
    }

    public function search(Request $request) {

        $id = $request->input('keyword');
        $keyword = $id;
        $post_result = BlogPosts::where('title', 'LIKE', "%$id%")->orwhere('body', 'LIKE', "%$id%")->paginate(15);

        $firmware_result = Firmware::where('title', 'LIKE', "%$id%")->orwhere('description', 'LIKE', "%$id%")->paginate(15);

        return view('search-result')->with([
            'post_result' => $post_result,
            'firmware_result'   => $firmware_result,
            'keyword' => $keyword
        ]);
    }

    public function show_page($id, $slug) {
        $page = Pages::findorfail($id);
        return view('template')->with([
            'page'  => $page
        ]);
    }
}
