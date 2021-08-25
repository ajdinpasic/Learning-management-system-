<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class attendanceController extends Controller
{
    public function index(Request $request)
    {
        $user_id = $request->user()->id;

        $allCourses = DB::select("SELECT courses.name FROM courses JOIN course_registrations ON courses.id = course_registrations.course_id WHERE course_registrations.user_id = '$user_id' ORDER BY courses.name ASC");

        $final_courses = [];

        for ($i = 0; $i < count($allCourses); $i++) {
            $final_courses[$i] = $allCourses[$i]->name;
        }
        try {
            $lecture_attendance = [];

            $k = 0;

            foreach ($allCourses as $key => $value) {
                $name_to_compare = $allCourses[$k++]->name;

                $value = Course::select('id')->where('name', $name_to_compare)->first();

                $lecture_attendance[] = DB::table('user_attendances')->join('users', 'user_attendances.user_id', '=', 'users.id')->join('courses', 'courses.id', '=', 'user_attendances.course_id')->where('user_attendances.user_id', $user_id)->where('user_attendances.course_id', $value->id)->where('user_attendances.type', "Lecture attendance")->where('user_attendances.present', 1)->groupBy('user_attendances.course_id')->orderBy('courses.name')->count();
            }


            $lab_attendance = [];

            $j = 0;

            foreach ($allCourses as $key => $value) {
                $name_to_compare = $allCourses[$j++]->name;

                $value = Course::select('id')->where('name', $name_to_compare)->first();

                $lab_attendance[] = DB::table('user_attendances')->join('users', 'user_attendances.user_id', '=', 'users.id')->join('courses', 'courses.id', '=', 'user_attendances.course_id')->where('user_attendances.user_id', $user_id)->where('user_attendances.course_id', $value->id)->where('user_attendances.type', "Lab attendance")->where('user_attendances.present', 1)->groupBy('user_attendances.course_id')->orderBy('courses.name')->count();
            }

            $total_attendance = [];

            $p = 0;

            foreach ($allCourses as $key => $value) {
                $name_to_compare = $allCourses[$p++]->name;

                $value = Course::select('id')->where('name', $name_to_compare)->first();

                $total_attendance[] = DB::table('user_attendances')->join('users', 'user_attendances.user_id', '=', 'users.id')->join('courses', 'courses.id', '=', 'user_attendances.course_id')->where('user_attendances.user_id', $user_id)->where('user_attendances.course_id', $value->id)->where('user_attendances.present', 1)->groupBy('user_attendances.course_id')->orderBy('courses.name')->count();
            }


            return view('layouts.attendance')->with('final_courses', json_encode($final_courses), JSON_NUMERIC_CHECK)->with('lecture_attendance', json_encode($lecture_attendance), JSON_NUMERIC_CHECK)->with('lab_attendance', json_encode($lab_attendance), JSON_NUMERIC_CHECK)->with('total_attendance', json_encode($total_attendance), JSON_NUMERIC_CHECK);
        } catch (Exception $E) {
            return view('layouts.attendance')->with('final_courses', json_encode($final_courses), JSON_NUMERIC_CHECK)->with('lecture_attendance', json_encode($lecture_attendance[]), JSON_NUMERIC_CHECK)->with('lab_attendance', json_encode($lab_attendance[]), JSON_NUMERIC_CHECK)->with('total_attendance', json_encode($total_attendance[]), JSON_NUMERIC_CHECK);
        }
    }
}
