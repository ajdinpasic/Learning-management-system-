<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{

    public function post(Request $request)
    {

        $userAttempt = $request->validate([
            "email" => "required|email",
            "password" => "required",
        ]);

        if (Auth::attempt($userAttempt)) {
            $request->session()->regenerate();
            return redirect()->route('home');
        } else {
            return back()->withErrors([
                "email" => "Creditentials do not match",
            ]);
        }
    }
}
