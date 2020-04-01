<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pages;
use Auth;

class AddNewPageController extends Controller
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
        $pages = Pages::all();
        return view('dashboard.all-pages')->with(['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.add-page');
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
           'title'          => 'required | unique:pages',
           'description'    => 'required',
        ]);

        $page = new Pages();
        $page->title        = $request->title;
        $page->description  = $request->description;
        $page->body         = $request->body;
        $page->is_publish   = (boolean)$request->is_publish;
        $page->save();
        return redirect(route('pages.index'))->with('success', $page->title.' created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $page = Pages::findorfail($id);
        return view('template')->with(['page' => $page]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Pages::findorfail($id);

        return view('dashboard.edit-page')->with(['page' => $page]);
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
        $page = Pages::findorfail($id);
        $page->title        = $request->title;
        $page->description  = $request->description;
        $page->body         = $request->body;
        $page->is_publish   = (boolean)$request->is_publish;
        $page->save();

        return redirect(route('pages.index'))->with('success', $page->title.' has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Pages::findorfail($id);
        $page->delete();
        return redirect(route('pages.index'))->with('success', $page->title . ' has been deleted successfully');
    }
}
