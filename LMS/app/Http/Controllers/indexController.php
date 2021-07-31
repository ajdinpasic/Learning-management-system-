<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function index(Request $request)
    {
        //$courses = Course::where("department", "=", "IT")->paginate(2);
        //dd($request->user()->course);
        //$courses = $request->user()->course()->paginate(2);
        $courses = $request->user()->course()->select('name', 'ects')->paginate(12);
        //$courses = Course::select('name')->where("department", "=", "IT")->paginate(2);
        $total_courses = Course::where("department", "=", "IT")->where("user_id", "=", auth()->user()->id)->count();

        $grades = $request->user()->grade()->select('title', 'grade')->paginate(12);
        $total_grades = Grade::where("user_id", "=", auth()->user()->id)->count();

        return view('layouts.index', ["courses" => $courses, "total_courses" => $total_courses, "grades" => $grades, "total_grades" => $total_grades]);
    }
}
