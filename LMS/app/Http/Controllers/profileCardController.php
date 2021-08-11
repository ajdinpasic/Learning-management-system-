<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class profileCardController extends Controller
{
    public function index(User $user, Request $request)
    {

        $courses = Course::where('user_id', $user->id)->get();
        //dd($test);
        return view('layouts.profile_card', ["user" => $user, "courses" => $courses]);
    }
}
