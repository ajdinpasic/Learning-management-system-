<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminAttendanceController extends Controller
{
    public function index(Course $course)
    {
        $allStudents = DB::table('users')->join('course_registrations', 'course_registrations.user_id', '=', 'users.id')->join('courses', 'course_registrations.course_id', '=', 'courses.id')->select('users.name', 'users.surname', 'users.avatar', 'course_registrations.created_at')->where('course_registrations.course_id', $course->id)->paginate(10);
        return view('layouts.admin_attendances', ["allStudents" => $allStudents, "course" => $course]);
    }
}
