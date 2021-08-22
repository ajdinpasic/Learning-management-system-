<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;

class profileCardController extends Controller
{
    public function index(User $user, Request $request)
    {
        $user_id = $request->user()->id;
        $courses = DB::select("SELECT courses.name FROM courses JOIN course_registrations ON courses.id = course_registrations.course_id WHERE course_registrations.user_id = '$user_id' ");


        return view('layouts.profile_card', ["user" => $user, "courses" => $courses]);
    }
}
