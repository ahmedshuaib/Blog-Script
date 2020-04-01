<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth' => 'verified']);
    }

    public function index()
    {
        return view('dashboard.profile');
    }

    public function change_info(Request $request, $id)
    {
        $user = User::findorfail($id);
        $profile_picture = "";
        if($request->has('image')) {
            $get_original_file = $request->file('image')->getClientOriginalName();
            $file_extension = $request->file('image')->getClientOriginalExtension();
            $file_name = pathinfo($get_original_file, PATHINFO_FILENAME);
            $profile_picture = $file_name .'_' . time() . '.' . $file_extension;
            $save_to_folder = $request->file('image')->storeAs('public/img', $profile_picture);
        }
        $user->email = $request->input('email');
        $user->name  = $request->name;
        if($request->has('image')) {
            $user->image = $profile_picture;
        }
        $user->save();
        return back()->with('success', 'Profile information successfully updated');
    }

    public function change_password(Request $request, $id)
    {
        $this->validate($request, [
           'password'   => 'required',
           'password'   => 'confirmed|max:50|different:old_pass'
        ]);

        $user = User::findorfail($id);
        if(Hash::check($request->old_pass, Auth::user()->password)) {
            $user->password = Hash::make($request->password);
            $user->save();
            return back()->with('success', 'Profile has been updated');
        }
        else {
            return back()->with('error', 'Old Password does not match');
        }

    }
}
