<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class coursesController extends Controller
{
    public function index(Request $request)
    {
        $id = $request->user()->id;

        $query = DB::select("SELECT courses.name,courses.ects,sum(grades.grade) AS sum FROM courses JOIN grades ON courses.id = grades.course_id WHERE courses.user_id='$id' GROUP BY (grades.course_id)");

        $query_only_courses = DB::select("SELECT courses.name,courses.ects FROM courses WHERE courses.user_id='$id'");
        //dd($query_only_courses);

        return view('layouts.courses', ["query" => $query, "query_only_courses" => $query_only_courses]);
    }
}
