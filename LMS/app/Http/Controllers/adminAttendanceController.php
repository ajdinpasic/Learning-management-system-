<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\UserAttendance;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class adminAttendanceController extends Controller
{
    public function index(Course $course)
    {
        $allStudents = DB::table('users')->join('course_registrations', 'course_registrations.user_id', '=', 'users.id')->join('courses', 'course_registrations.course_id', '=', 'courses.id')->select('users.name', 'users.surname', 'users.avatar', 'course_registrations.created_at')->where('course_registrations.course_id', $course->id)->paginate(10);
        return view('layouts.admin_attendances', ["allStudents" => $allStudents, "course" => $course]);
    }

    public function enterAtt(User $user, $course)
    {
        return view('actions.action_Enteratt', ["course" => $course, "user" => $user]);
    }

    public function postAtt(User $user, Request $request)
    {


        $request->validate([

            'attendance' => 'required',
            'present' =>  'required',


        ]);

        $course = Course::where("name", $request->hiddenValueCourse)->first();

        UserAttendance::create([

            "type" => $request->attendance,
            "present" => $request->present,
            "user_id" => $user->id,
            "course_id" => $course->id,
        ]);

        Toastr::success("Attendance is entered into the system!");

        return back();
    }
}
