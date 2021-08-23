<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function index(Request $request)
    {
        /*
        $courses = $request->user()->course()->select('name', 'ects')->get();

        $total_courses = Course::where("department", "=", "IT")->where("user_id", "=", auth()->user()->id)->count();

        $grades = $request->user()->grade()->select('title', 'grade')->get();
        $total_grades = Grade::where("user_id", "=", auth()->user()->id)->count();

        $allExamDates = $request->user()->examDate()->get(['title', 'scheduled_for']);
        $total_exams = $request->user()->examDate()->count();

        return view('layouts.index', ["courses" => $courses, "total_courses" => $total_courses, "grades" => $grades, "total_grades" => $total_grades, "allExamDates" => $allExamDates, "total_exams" => $total_exams]); */
        $user_id = $request->user()->id;

        $totalPoints = DB::select("SELECT courses.name, SUM(grades.student_grade) as suma FROM courses JOIN grades ON courses.id = grades.course_id WHERE grades.user_id = '$user_id' GROUP BY grades.course_id ORDER BY courses.name ASC");

        $allExams = DB::select("SELECT  exams.scheduled_for,courses.name FROM exams 
            JOIN courses ON exams.course_id = courses.id
            JOIN course_registrations ON courses.id = course_registrations.course_id
            WHERE course_registrations.user_id = '$user_id '
            ");

        $allGrades = DB::select("SELECT  courses.name,grades.student_grade,grades.examination FROM grades JOIN courses ON courses.id = grades.course_id  WHERE grades.user_id = '$user_id'  ORDER BY courses.name ASC");

        $numberOfExams = count($allExams);
        $numberOfCourses = count($request->user()->registration);
        $numberOfGrades = count($allGrades);


        return view('layouts.index', ["totalPoints" => $totalPoints, "numberOfCourses" => $numberOfCourses, "numberOfExams" => $numberOfExams, "allGrades" => $allGrades, "allExams" => $allExams, "numberOfGrades" => $numberOfGrades]);
    }
}
