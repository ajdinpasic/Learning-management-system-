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
        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $toUser = $request->email;
        $userName = $request->username;
        Mail::to($toUser)->send(new Welcome($userName));
        return redirect()->route('login');
    }
}
