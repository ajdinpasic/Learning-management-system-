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
        //$courses = Course::where("department", "=", "IT")->paginate(10);
        //$courses = $request->user()->course()->select('name', 'ects')->get();
        $query = DB::select("SELECT courses.name,courses.ects,sum(grades.grade) AS sum FROM courses JOIN grades ON courses.id = grades.course_id WHERE courses.user_id='$id' GROUP BY (grades.course_id)");
        return view('layouts.courses', ["query" => $query]);
    }
}
