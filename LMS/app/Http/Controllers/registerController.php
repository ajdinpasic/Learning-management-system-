<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class registerController extends Controller
{
    
    public function post(Request $request) {
       
        
        $newUser=$request->validate([
            'username' => 'required|min:3|max:8|alpha',
            'email' => 'required|email',
            'password' => 'required|min:4|confirmed',
        ]); 
        
        User::create([
            'name' => $request->username,
            'email' => $request->email, 
            'password' => $request->password, 
        ]);
        
        return redirect()->route('login');

    }
}
