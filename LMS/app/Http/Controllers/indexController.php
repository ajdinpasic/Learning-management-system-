<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function index(Request $request)
    {

        $courses = $request->user()->course()->select('name', 'ects')->get();

        $total_courses = Course::where("department", "=", "IT")->where("user_id", "=", auth()->user()->id)->count();

        $grades = $request->user()->grade()->select('title', 'grade')->get();
        $total_grades = Grade::where("user_id", "=", auth()->user()->id)->count();

        $allExamDates = $request->user()->examDate()->get(['title', 'scheduled_for']);
        $total_exams = $request->user()->examDate()->count();

        return view('layouts.index', ["courses" => $courses, "total_courses" => $total_courses, "grades" => $grades, "total_grades" => $total_grades, "allExamDates" => $allExamDates, "total_exams" => $total_exams]);
    }
}
