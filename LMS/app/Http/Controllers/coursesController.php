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


        $allCourses = DB::select("SELECT course_registrations.final,courses.name,courses.abbreviation,courses.ECTS FROM courses JOIN course_registrations ON courses.id = course_registrations.course_id WHERE course_registrations.user_id = '$user_id' ");

        $adminCourses = DB::select("SELECT courses.name FROM courses JOIN course_registrations ON course_registrations.course_id = courses.id JOIN users ON users.id = course_registrations.user_id WHERE course_registrations.user_id = '$user_id' ");

        return view('layouts.courses', ["allCourses" => $allCourses, "adminCourses" => $adminCourses]);
    }
}
