<?php

namespace App\Http\Controllers;

use App\Models\CourseRegistration;
use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class examsController extends Controller
{
    public function index(Request $request)
    {

        $user_id = $request->user()->id;


        $allCourses = CourseRegistration::select('course_id')->where('user_id', $user_id)->get();


        $allExams = DB::table('exams')->join('courses', 'exams.course_id', '=', 'courses.id')->select('exams.scheduled_for', 'exams.classroom_number', 'exams.duration_time', 'exams.proctor', 'exams.title', 'courses.name')->whereIn('exams.course_id', $allCourses)->get();


        return view('layouts.exams', ["allExams" => $allExams]);
    }
}
