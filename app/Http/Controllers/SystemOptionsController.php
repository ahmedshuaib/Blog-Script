<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SystemOptions;

class SystemOptionsController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function index()
    {
        $options = SystemOptions::first();
        return view('dashboard.system-options')->with(['options' => $options]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $option = SystemOptions::findorfail($id);
        $logo = "";
        $favicon = "";
        $default_thumbnail = "";

        if($request->has('logo')) {
            //get client original file name
            $img_with_ext = $request->file('logo')->getClientOriginalName();
            //get only filename
            $fileName = pathinfo($img_with_ext, PATHINFO_FILENAME);
            //get file extension
            $file_ext = $request->file('logo')->getClientOriginalExtension();
            //upload time
            $logo = $fileName. '_' . time() . '.' . $file_ext;
            //save server storage
            $cover_image = $request->file('logo')->storeAs('public/img', $logo);
        }

        if($request->has('default_thumbnail')) {
            //get client original file name
            $img_with_ext = $request->file('default_thumbnail')->getClientOriginalName();
            //get only filename
            $fileName = pathinfo($img_with_ext, PATHINFO_FILENAME);
            //get file extension
            $file_ext = $request->file('default_thumbnail')->getClientOriginalExtension();
            //upload time
            $default_thumbnail = $fileName. '_' . time() . '.' . $file_ext;
            //save server storage
            $cover_image = $request->file('default_thumbnail')->storeAs('public/img', $default_thumbnail);
        }

        if($request->has('favicon')) {
            //get client original file name
            $img_with_ext = $request->file('favicon')->getClientOriginalName();
            //get only filename
            $fileName = pathinfo($img_with_ext, PATHINFO_FILENAME);
            //get file extension
            $file_ext = $request->file('favicon')->getClientOriginalExtension();
            //upload time
            $favicon = $fileName. '_' . time() . '.' . $file_ext;
            //save server storage
            $cover_image = $request->file('favicon')->storeAs('public/img', $favicon);
        }

        $option->web_title  = $request->input('web_title');
        $option->web_url    = $request->input('web_url');

        if($request->has('logo')) {
            $option->logo    = $logo;
        }

        if($request->has('favicon')) {
            $option->favicon_icon    = $favicon;
        }

        if($request->has('default_thumbnail')) {
            $option->default_thumbnail = $default_thumbnail;
        }

        $option->meta_keywords  = $request->input('meta_keywords');
        $option->meta_description = $request->input('meta_description');
        $option->contact_email = $request->input('contact_email');
        $option->support_email = $request->input('support_email');
        $option->technical_email = $request->input('technical_email');
        $option->phone_number = $request->input('phone_number');
        $option->account_number = $request->input('account_number');
        $option->save();

        return redirect(route('options.index'))->with('success', 'Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
