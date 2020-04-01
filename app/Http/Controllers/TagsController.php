<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;

class TagsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function index()
    {
        $tags = Tag::orderBy('created_at', 'desc')->get();
        return view('dashboard.add-tags', compact('tags'));
    }


    public function create()
    {
        $tags = Tag::orderby('created_at', 'desc')->get();
        return view('dashboard.add-tags')->with('tags', $tags);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
           'title'  => 'required | unique:tags'
        ]);
        $tag = new Tag;
        $tag->title = $request->input('title');
        $tag->description = $request->input('description');
        $tag->save();
        return back()->with('success', $tag->title.' has been created');
    }

    public function show($id)
    {
        return redirect(route('tags.index'));
    }


    public function edit($id)
    {
        $tag = Tag::findOrFail($id);
        return view('dashboard.edit-tags')->with(['tag' => $tag]);
    }
    public function update(Request $request, $id)
    {
        $tag = Tag::findorfail($id);
        $tag->title = $request->input('title');
        $tag->description = $request->input('description');
        $tag->save();
        return redirect(route('tags.index'))->with('success', $tag->title. ' updated successfully');
    }


    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        $tag->posts()->detach();
        $tag->firmware()->detach();
        $tag->delete();
        return back()->with('success', $tag->title.' deleted SuccessFully');
    }
}
