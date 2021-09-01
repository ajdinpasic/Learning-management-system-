<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Welcome;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseRegistration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class registerController extends Controller
{


    public function post(Request $request)
    {


        $newUser = $request->validate([
            'name' => 'required|min:3|max:10|alpha',
            'surname' => 'required|min:3|max:10|alpha',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:4|confirmed',
        ]);

        /*if (User::where('email', '=', $request->email)->exists()) {
            return back()->withErrors([
                "email" => "User with this email already exists",
            ])->withInput();
        } */

        $newUser = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        //dd($request->id);
        CourseRegistration::create([
            'user_id' => $newUser->id,
            'course_id' => 1,
        ]);

        CourseRegistration::create([
            'user_id' => $newUser->id,
            'course_id' => 2,
        ]);

        CourseRegistration::create([
            'user_id' => $newUser->id,
            'course_id' => 3,
        ]);

        CourseRegistration::create([
            'user_id' => $newUser->id,
            'course_id' => 4,
        ]);


        $toUser = $request->email;
        $name = $request->name;
        $surname = $request->surname;
        Mail::to($toUser)->send(new Welcome($name, $surname));
        return redirect()->route('login');
    }
}
