<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Course;
use App\Mail\GradeEntered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class gradesAdminController extends Controller
{
    public function index()
    {
        $allStudents = User::select('id', 'name', 'email', 'created_at')->get();
        $allGrades = DB::select("SELECT grades.title as title, grades.grade as grade, users.name as name FROM grades JOIN users ON grades.user_id = users.id");
        //$allGrades = Grade::select('title', 'grade')->get();

        for ($i = 0; $i < count($allStudents); $i++) {

            $user_id = $allStudents[$i]->id;
            $coursesForStudent = DB::select("SELECT DISTINCT name as name FROM courses");
        }

        return view('layouts.admin_users', ["allStudents" => $allStudents, "coursesForStudent" => $coursesForStudent, "allGrades" => $allGrades]);
    }

    public function store(Request $request)
    {
        $newGrade = $request->validate([
            "examination" => "required",
            "grade" => "required|numeric|min:00.00|max:100.00",
            "select" => "required",

        ]);

        $user = User::select('id')->where('name', '=', $request->hiddenValue)->first();
        $course = Course::select('id')->where('name', '=', $request->select)->where('user_id', '=', $user->id)->first();

        Grade::create([
            "title" => $request->examination . " from " . $request->select,
            "grade" => $request->grade,
            "user_id" => $user->id,
            "course_id" => $course->id,
        ]);

        return redirect()->route('home');
    }

    public function update(Request $request)
    {
        $request->validate([
            "select" => "required",
            "grade" => "required|numeric|min:00.00|max:100.00",
        ]);

        $course_name_trimmed = strstr($request->select, "=>", true);

        $user_id = User::where('name', '=', $request->hiddenValue1)->first();

        $grade = Grade::where('user_id', '=', $user_id->id)->where('title', '=', $course_name_trimmed)->firstOrFail();

        $grade->grade = $request->grade;
        $grade->save();

        return redirect()->route('home');
    }
    public function delete(Request $request)
    {
        $request->validate([
            "select" => "required",
        ]);
        $course_name_trimmed = strstr($request->select, "=>", true);
        $user_id = User::where('name', '=', $request->hiddenValue2)->first();

        $grade = Grade::where('user_id', '=', $user_id->id)->where('title', '=', $course_name_trimmed)->firstOrFail();

        $grade->delete();

        return redirect()->route('home');
    }
}
