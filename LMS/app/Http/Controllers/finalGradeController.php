<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Http\Request;
use App\Models\CourseRegistration;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;
use Exception;
use Illuminate\Pagination\Paginator;

class finalGradeController extends Controller
{
    public function index(Course $course)
    {
        $pag = 10;

        //$allStudents = DB::table('users')->join('course_registrations', 'course_registrations.user_id', '=', 'users.id')->join('courses', 'course_registrations.course_id', '=', 'courses.id')->select('users.id', 'users.name', 'users.surname', 'users.avatar', 'course_registrations.created_at', 'course_registrations.final')->where('course_registrations.course_id', $course->id)->orderByDesc('users.name')->paginate($pag);


        $allStudents = DB::select("SELECT SUM(grades.student_grade) AS finalno ,users.id,users.name, users.surname, users.avatar, course_registrations.created_at, course_registrations.final FROM users JOIN course_registrations ON course_registrations.user_id = users.id JOIN grades ON grades.user_id = users.id WHERE course_registrations.course_id = '$course->id' AND grades.course_id = '$course->id' GROUP BY users.id, users.name, users.surname, users.avatar, course_registrations.created_at, course_registrations.final ORDER BY users.name DESC");

        //dd($allStudents[1]->finalno);
        //$allSums = DB::select("SELECT COALESCE((SELECT(SUM(grades.student_grade)) AS finalno FROM grades JOIN users ON users.id = grades.user_id WHERE grades.course_id = '$course->id' GROUP BY grades.user_id ORDER BY users.name DESC ))AS good,0 AS bad");
        //dd($allStudents);
        //$allSums = [];
        /*
        $test[$k] = DB::select("SELECT SUM(grades.student_grade) AS finalno FROM grades JOIN users ON users.id = grades.user_id WHERE grades.course_id = 10 GROUP BY grades.user_id ORDER BY users.name DESC ");
        dd($test[$k]);
        if (gettype($test[$k])) {
            dd("shit");
        }
        dd("3232");

        for ($i = 0; $i < $pag; $i++) {

            $allNums[$k] =
                $allSums = DB::select("SELECT(SUM(grades.student_grade) AS finalno FROM grades JOIN users ON users.id = grades.user_id WHERE grades.course_id = '$course->id' GROUP BY grades.user_id ORDER BY users.name DESC ");
            if ($allNums[$k] == "") {
            }
        }
 */
        //$allSums = DB::select("SELECT COALESCE((SELECT SUM(grades.student_grade) AS finalno FROM grades JOIN users ON users.id = grades.user_id WHERE grades.course_id = '$course->id' GROUP BY grades.user_id ORDER BY users.name DESC )),0 as finalno");

        $allStudents = new Paginator($allStudents, 10);

        //$allSums = DB::select("SELECT SUM(grades.student_grade) AS teska_suma FROM grades WHERE grades.course_id = $course->id");


        return view('layouts.admin_finals', ["allStudents" => $allStudents, "course" => $course]);
    }
    /*
    public function enterFinal(User $user, $course)
    {
        $real_course = Course::where('name', $course)->first();

        // $finalGrade = Grade::where('course_id', $real_course->id)->where('user_id', $user->id)->selectRaw("SUM(student_grade) AS student_grade")->groupBy('course_id')->first();

        $finalGrade = DB::select("SELECT SUM(student_grade) AS student_grade FROM grades WHERE course_id = '$real_course->id' AND user_id = '$user->id' GROUP BY '$real_course->id'");

        $final = "";
        dd($finalGrade[0]->student_grade);

        if (empty($finalGrade)) {
            $final = "N/A";
        } else {
            if ($finalGrade[0]->student_grade >= 95) {
                $final = "A";
            } else if ($finalGrade[0]->student_grade >= 85) {
                $final = "B";
            } else if ($$finalGrade[0]->student_grade >= 75) {
                $final = "C";
            } else if ($$finalGrade[0]->student_grade >= 65) {
                $final = "D";
            } else if ($$finalGrade[0]->student_grade >= 55) {
                $final = "E";
            } else {
                $final = "F";
            }
        }

        return view('actions.action_Enterfinal', ["course" => $course, "user" => $user, "final" => $final]);
    } */

    public function post($course, Request $request)
    {
        if ($request->hiddenValueFinal == "N/A") {
            Toastr::error("There are no grade for this student");
            return back();
        }

        $real_course = Course::where('name', $course)->first();
        $final = CourseRegistration::where('user_id', $request->hiddenValueId)->where('course_id', $real_course->id)->first();


        $final->final = $request->hiddenValueFinal;
        $final->save();
        Toastr::success("Final grade has been concluded!");
        return back();
    }
}
