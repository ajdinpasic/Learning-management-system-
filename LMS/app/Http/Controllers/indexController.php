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

        $user_id = $request->user()->id;

        $totalPoints = DB::select("SELECT courses.name, SUM(grades.student_grade) as suma FROM courses JOIN grades ON courses.id = grades.course_id WHERE grades.user_id = '$user_id' GROUP BY grades.course_id ORDER BY courses.name ASC LIMIT 2");

        $totalAttendance = DB::select("SELECT courses.name, SUM(user_attendances.present) AS prisustvo FROM user_attendances JOIN courses ON courses.id = user_attendances.course_id WHERE user_attendances.user_id = '$user_id' AND user_attendances.present = 1 GROUP BY user_attendances.course_id LIMIT 2");


        $allExams = DB::select("SELECT  exams.scheduled_for,courses.name FROM exams 
            JOIN courses ON exams.course_id = courses.id
            JOIN course_registrations ON courses.id = course_registrations.course_id
            WHERE course_registrations.user_id = '$user_id ' LIMIT 2
            ");

        $allGrades = DB::select("SELECT  courses.name,grades.student_grade,grades.examination FROM grades JOIN courses ON courses.id = grades.course_id  WHERE grades.user_id = '$user_id'  ORDER BY courses.name ASC LIMIT 2");



        $numberOfExams = count($allExams);
        $numberOfCourses = count($request->user()->registration);
        $numberOfGrades = count($allGrades);


        return view('layouts.index', ["totalPoints" => $totalPoints, "numberOfCourses" => $numberOfCourses, "numberOfExams" => $numberOfExams, "allGrades" => $allGrades, "allExams" => $allExams, "numberOfGrades" => $numberOfGrades, "totalAttendance" => $totalAttendance]);
    }
}
