<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class logoutController extends Controller
{
    public function post(Request $request)
    {

        Auth::logout();
        $request->Session()->invalidate();
        $request->Session()->regenerateToken();
        return redirect()->route('login');
    }
}
