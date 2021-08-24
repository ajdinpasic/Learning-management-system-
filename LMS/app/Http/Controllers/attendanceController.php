<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class attendanceController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user()->id;

        $allCourses = DB::select("SELECT courses.name FROM courses JOIN course_registrations ON courses.id = course_registrations.course_id WHERE course_registrations.user_id = '$user_id' ORDER BY courses.name ASC");


        for ($i = 0; $i < count($allCourses); $i++) {
            $final_courses[$i] = $allCourses[$i]->name;
        }

        $attendance = [];

        $k = 0;

        foreach ($allCourses as $key => $value) {
            $name_to_compare = $allCourses[$k++]->name;

            $value = Course::select('id')->where('name', $name_to_compare)->first();

            $attendance[] = DB::table('user_attendances')->join('users', 'user_attendances.user_id', '=', 'users.id')->join('courses', 'courses.id', '=', 'user_attendances.course_id')->where('user_attendances.user_id', $user_id)->where('user_attendances.course_id', $value->id)->groupBy('user_attendances.course_id')->orderBy('courses.name')->count();
        }





        return view('layouts.attendance')->with('final_courses', json_encode($final_courses, JSON_NUMERIC_CHECK))->with('attendance', json_encode($attendance, JSON_NUMERIC_CHECK));
    }
}
