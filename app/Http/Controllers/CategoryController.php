<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('dashboard.add-category', compact('categories'));
    }

    public function create()
    {
        $categories = Category::all();
        $action = route('category.store');
        return view('dashboard.add-category')->with(compact('categories','action'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [         //after unique put table name
           'title'  => 'required | unique:categories',
           'description' => 'required'
        ]);

        $cate = new Category;
        $cate->icon = $request->icon;
        $cate->title        = $request->input('title');
        $cate->description  = $request->input('description');
        if((int)$request->input('parent_id') != null) {$cate->parent_id    = $request->input('parent_id');}
        $cate->save();
        return redirect(route('category.index'))->with('success', $cate->title.' Added Successfully');
    }

    public function show($id)
    {
        return redirect(route('category.index'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $category = Category::findorfail($id);
        return view('dashboard.edit-category')->with(['category' => $category, 'categories' => $categories]);
    }


    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:3',
            'description' => 'required'
        ]);

        $category = Category::findOrFail($id);
        $category->icon = $request->icon;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->parent_id= (integer)$request->parent_id;
        $category->save();

        return back()->with('success', $category->title .' updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return back()->with('success', $category->title.' deleted SuccessFully');
    }
}
