<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function PHPUnit\Framework\isEmpty;

class gradesController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user()->id;


        $allGrades = DB::select("SELECT  courses.name,grades.student_grade,grades.max_grade,grades.examination FROM grades JOIN courses ON courses.id = grades.course_id  WHERE grades.user_id = '$user_id'  ORDER BY courses.name ASC");


        $totalPoints = DB::select("SELECT courses.name, SUM(grades.student_grade) as suma FROM courses JOIN grades ON courses.id = grades.course_id WHERE grades.user_id = '$user_id' GROUP BY grades.course_id ORDER BY courses.name ASC");

        $adminCourses = DB::select("SELECT courses.name FROM courses JOIN course_registrations ON course_registrations.course_id = courses.id JOIN users ON users.id = course_registrations.user_id WHERE course_registrations.user_id = '$user_id' ");



        return view('layouts.grades', ["allGrades" => $allGrades, "totalPoints" => $totalPoints, "adminCourses" => $adminCourses]);
    }
}
