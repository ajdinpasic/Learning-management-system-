<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class gradesController extends Controller
{
    public function index(Request $request)
    {
        $courses = $request->user()->course()->select('name')->get();
        //$grades = DB::table('grades')->where('user_id', '=', $request->user()->id)->groupBy('course_id')->sum('grade');

        /* $grades = DB::table('grades')
            ->join('courses', 'grades.course_id', '=', 'courses.id')
            ->where('grades.user_id', '=', $request->user()->id)
            ->sum('grades.grade'); */

        //$grades = Grade::selectRaw('sum(grade) AS sum')->where('user_id', '=', $request->user()->id)->groupBy('course_id')->get();

        //dd($courses);
        $id = $request->user()->id;

        $query = DB::select("SELECT courses.name,sum(grades.grade) AS sum FROM courses JOIN grades ON courses.id = grades.course_id WHERE courses.user_id='$id' GROUP BY (grades.course_id)");


        // return view('layouts.grades', ["courses" => $courses, "grades" => $grades]);
        return view('layouts.grades', ["query" => $query]);
    }
}
