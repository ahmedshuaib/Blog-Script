<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPosts;
use App\Tag;
use App\Category;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = BlogPosts::orderby('created_at', 'desc')->get();
        return view('dashboard.all-posts')->with([
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('dashboard.post-create')->with(['tags' => $tags, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required | unique:blog_posts',
            'body'  => 'required',
            'thumbnail' => 'image|nullable|max:1999'
        ]);

        $post_thumbnail = "";
        if($request->has('thumbnail')) {
            //get client original file name
            $img_with_ext = $request->file('thumbnail')->getClientOriginalName();
            //get only filename
            $fileName = pathinfo($img_with_ext, PATHINFO_FILENAME);
            //get file extension
            $file_ext = $request->file('thumbnail')->getClientOriginalExtension();
            //upload time
            $post_thumbnail = $fileName. '_' . time() . '.' . $file_ext;
            //save server storage
            $cover_image = $request->file('thumbnail')->storeAs('public/img', $post_thumbnail);
        }
        else {
            $post_thumbnail = 'noimage.png';
        }

        $post = new BlogPosts;
        $post->title        = $request->input('title');
        $post->body         = $request->input('body');
        $post->thumbnail    = $post_thumbnail;
        $post->category_id  = (integer)$request->input('category');
        $post->save();
        $post->tags()->sync($request->tags, false);

        return redirect(route('posts.index'))->with('success', $post->title.' added in post');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post   = BlogPosts::findorfail($id);
        $tags   = Tag::all();
        $categories = Category::all();

        return view('dashboard.edit-post')->with([
            'post'          => $post,
            'tags'          => $tags,
            'categories'    => $categories
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = BlogPosts::findorfail($id);
        $post_thumbnail = "";
        if($request->has('thumbnail')) {
            //get client original file name
            $img_with_ext = $request->file('thumbnail')->getClientOriginalName();
            //get only filename
            $fileName = pathinfo($img_with_ext, PATHINFO_FILENAME);
            //get file extension
            $file_ext = $request->file('thumbnail')->getClientOriginalExtension();
            //upload time
            $post_thumbnail = $fileName. '_' . time() . '.' . $file_ext;
            //save server storage
            $cover_image = $request->file('thumbnail')->storeAs('public/img', $post_thumbnail);
        }

        $post->title        = $request->input('title');
        $post->body         = $request->input('body');
        if($request->has('thumbnail')) {
            $post->thumbnail    = $post_thumbnail;
        }
        $post->category_id  = (integer)$request->input('category');
        $post->save();

        if(isset($request->tags)) {
            $post->tags()->sync($request->tags);
        }
        else {
            $post->tags()->sync(array());
        }

        return redirect(route('posts.index'))->with('success', $post->title . ' updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = BlogPosts::findorfail($id);
        if($post->thumbnail != 'noimage.png' || $post->thumbnail == null) {
            Storage::delete('public/img'.$post->thumbnail);
        }
        $post->tags()->detach();
        $post->delete();
        return redirect(route('posts.index'))->with('success', $post->title . ' has been deleted successfully');
    }
}
