<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class coursesController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user()->id;


        $allCourses = DB::select("SELECT courses.name,courses.abbreviation,courses.ECTS FROM courses JOIN course_registrations ON courses.id = course_registrations.course_id WHERE course_registrations.user_id = '$user_id' ");

        return view('layouts.courses', ["allCourses" => $allCourses]);
    }
}
