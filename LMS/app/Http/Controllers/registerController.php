<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Welcome;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Console\Input\Input;

class registerController extends Controller
{


    public function post(Request $request)
    {


        $newUser = $request->validate([
            'username' => 'required|min:3|max:8|alpha',
            'email' => 'required|email',
            'select' => 'required',
            'password' => 'required|min:4|confirmed',
        ]);

        if (User::where('email', '=', $request->email)->exists()) {
            return back()->withErrors([
                "email" => "User with this email already exists",
            ])->withInput();
        }

        $newUser = User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        if ($request->select == "IT") {

            Course::create([
                'name' => "Web development",
                'ects' => 6,
                'department' => 'IT',
                'user_id' => $newUser->id,
            ]);

            Course::create([
                'name' => "Mobile development",
                'ects' => 6,
                'department' => 'IT',
                'user_id' => $newUser->id,
            ]);

            Course::create([
                'name' => "Data Structures",
                'ects' => 6,
                'department' => 'IT',
                'user_id' => $newUser->id,
            ]);

            Course::create([
                'name' => "Business",
                'ects' => 4,
                'department' => 'IT',
                'user_id' => $newUser->id,
            ]);
        }

        $toUser = $request->email;
        $userName = $request->username;
        Mail::to($toUser)->send(new Welcome($userName));
        return redirect()->route('login');
    }
}
