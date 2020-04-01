<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Firmware;
use App\Category;
use App\Tag;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Type;

class FirmwareController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function index()
    {
        $firmwares = Firmware::all();

        return view('dashboard.all-firmware')->with(['firmwares' => $firmwares]);
    }


    public function create()
    {
        $categories = Category::all();
        $tags       = Tag::all();
        return view('dashboard.firmware-create')->with([
            'categories' => $categories,
            'tags'       => $tags
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title'         => 'required | max:255',
            'body'          => 'required',
            'download_link'  => 'required',
            'file_size'     => 'required',
            'thumbnail'     => 'image|nullable|max:1999',
            'description'   => 'required | max:255',
            'data-type'     => 'required'
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

        $post = new Firmware;
        $post->title        = $request->input('title');
        $post->body         = $request->input('body');
        $post->thumbnail    = $post_thumbnail;
        $post->category_id  = (integer)$request->input('category');
        $post->download_link = $request->input('download_link');
        $post->description  = $request->input('description');
        $post->firmware_size    = $request->input('file_size');
        $post->is_publish   = (boolean)$request->is_publish;
        $post->data_type    = $request->input('data-type');
        $post->save();
        $post->tags()->sync($request->tags, false);

        return redirect(route('firmware.index'))->with('success', 'New firmware addded successfully');
    }

    public function show($id)
    {
        return back();
    }


    public function edit($id)
    {
        $post = Firmware::findorfail($id);
        $tags   = Tag::all();
        $categories = Category::all();
        return view('dashboard.edit-firmware')->with([
            'post'  => $post,
            'tags'  => $tags,
            'categories'    => $categories
        ]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title'         => 'required | max:255',
            'body'          => 'required',
            'download_link' => 'required',
            'file_size'     => 'required',
            'thumbnail'     => 'image|nullable|max:1999',
            'description'   => 'required',
            'data-type'     => 'required'
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

        $post = Firmware::findorfail($id);
        $post->title        = $request->input('title');
        $post->body         = $request->input('body');
        if($request->has('thumbnail')) {
            $post->thumbnail    = $post_thumbnail;
        }
        $post->category_id  = (integer)$request->input('category');
        $post->download_link = $request->input('download_link');
        $post->description  = $request->input('description');
        $post->firmware_size    = $request->input('file_size');
        $post->data_type    = $request->input('data-type');
        $post->is_publish   = (boolean)$request->is_publish;
        $post->save();
        if(isset($request->tags)) {
            $post->tags()->sync($request->tags);
        }
        else {
            $post->tags()->sync(array());
        }
        return redirect(route('firmware.index'))->with('success', 'Firmware updated successfully');
    }

    public function destroy($id)
    {
        $post = Firmware::findorfail($id);
        if($post->thumbnail != 'noimage.png' || $post->thumbnail == null) {
            Storage::delete('public/img'.$post->thumbnail);
        }
        $post->tags()->detach();
        $post->delete();
        return redirect(route('firmware.index'))->with('success', $post->title . ' has been deleted successfully');
    }
}
