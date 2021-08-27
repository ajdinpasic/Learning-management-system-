<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class profileCardController extends Controller
{
    public function index(User $user, Request $request)
    {
        $user_id = $request->user()->id;
        $courses = DB::select("SELECT courses.name FROM courses JOIN course_registrations ON courses.id = course_registrations.course_id WHERE course_registrations.user_id = '$user_id' ");


        return view('layouts.profile_card', ["user" => $user, "courses" => $courses]);
    }
    public function upload(User $user, Request $request)
    {
        $request->validate([
            'user_avatar' => 'required|image|max:2048|dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000',
        ]);

        if ($request->hasFile('user_avatar')) {
            $avatar = $request->file('user_avatar');  // get the uploaded avatar
            $filename = time() . '.' . $avatar->getClientOriginalExtension(); // create file name
            // Image::make($avatar)->resize(300, 300)->save(public_path('/avatars/' . $filename)); // add avatar to public/avatars folder
            $destinationPath = public_path('/avatars');
            $avatar->move($destinationPath, $filename);
            $user = User::find($request->user()->id); // find the user by his ID
            $user->avatar = $filename; // upload its attribute
            $user->save(); // commit change
        }


        return back();
    }
}
