<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\Welcome;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class registerController extends Controller
{


    public function post(Request $request)
    {


        $newUser = $request->validate([
            'username' => 'required|min:3|max:8|alpha',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]);
        //dd($request);

        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        //Mail::to($request->$request->email)->send(new Welcome);

        return redirect()->route('login');
    }
}
