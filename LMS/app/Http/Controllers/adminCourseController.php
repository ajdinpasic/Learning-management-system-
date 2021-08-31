<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use App\Models\Course;
use App\Models\Grade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Brian2694\Toastr\Facades\Toastr;

class adminCourseController extends Controller
{
    public function index(Course $course)
    {
        $allStudents = DB::table('users')->join('course_registrations', 'course_registrations.user_id', '=', 'users.id')->join('courses', 'course_registrations.course_id', '=', 'courses.id')->select('users.name', 'users.surname', 'users.avatar', 'course_registrations.created_at')->where('course_registrations.course_id', $course->id)->paginate(10);


        return view('layouts.admin_courses', ["allStudents" => $allStudents, "course" => $course]);
    }
    public function upload(Course $course, Request $request)
    {


        $request->validate([
            'schedule_for' => 'required',
            'classroom' => 'required',
            'duration' => 'required',
            'proctor' => 'required',
            'examination' => 'required',

        ]);
        $time1 = "00:05:00";
        $time2 = "02:00:00";
        $currentTime = date("Y-m-d H:i:s"); // curent time

        if (strtotime($request->duration) < strtotime($time1) || strtotime($request->duration) > strtotime($time2)) {
            Toastr::error('Duration needs to be between 5 minutes and 3 hours');
            return back()->withErrors([
                "duration" => "Duration needs to be between 5 minutes and 3 hours",
            ]);
        }

        $limit = strtotime("+7 day", strtotime($currentTime));
        $limit = date('Y-m-d H:i:s', $limit);
        $examTime =  date("Y-m-d H:i:s", strtotime($request->schedule_for)); // exam time



        if ($examTime < $limit) {
            Toastr::error('You may schedule exam only 7 days ahead!');
            return back()->withErrors([
                "schedule_for" => "You may schedule exam only 7 days ahead!",
            ]);
        }
        //dd("good");

        $time3 = "09:00:00";
        $time4 = "16:00:00";
        $secondExamTime = date("H:i:s", strtotime($examTime));
        if ($secondExamTime > $time4 || $secondExamTime < $time3) {
            Toastr::error('You may schedule exam only between 09:00 and 16:00!');
            return back()->withErrors([
                "schedule_for" => "You may schedule exam only between 09:00 and 16:00!",
            ]);
        }
        Exam::create([
            'scheduled_for' => $request->schedule_for,
            'classroom_number' => $request->classroom,
            'duration_time' => $request->duration,
            'proctor' => $request->proctor,
            'course_id' => $course->id,
            'title' => $request->examination,
        ]);

        return redirect()->route('home');
    }

    public function enterGrade(User $user, $course)
    {
        return view('actions.action_Entergrades', ["course" => $course, "user" => $user]);
    }

    public function postGrade(User $user, Request $request)
    {
        //dd($request->request);
        $request->validate([

            'examination' => 'required',
            'max_grade' =>  'required|numeric',
            'student_grade' =>  'required|numeric',

        ]);

        $course = Course::where("name", $request->hiddenValueCourse)->first();

        Grade::create([

            "max_grade" => $request->max_grade,
            "student_grade" => $request->student_grade,
            "examination" => $request->examination,
            "user_id" => $user->id,
            "course_id" => $course->id,
        ]);

        Toastr::success("Exam is entered into the system!");

        return back();
    }
    public function editGrade(User $user, $course)
    {
        //dd($course);
        $real_course = Course::where('name', $course)->first();
        $allGrades = Grade::select('id', 'examination', 'max_grade', 'student_grade')->where('user_id', $user->id)->where('course_id', $real_course->id)->get();
        //dd($allGrades);
        return view('actions.action_Editgrades', ["allGrades" => $allGrades, "user" => $user, "course" => $course]);
    }

    public function putGrade(User $user, $course, Request $request)
    {

        $request->validate([
            'examination' => 'required',
            'student_grade' => 'required|numeric|between:0,100',
        ]);

        $grade_model = Grade::find($request->hiddenValueGrade);
        $grade_model->student_grade = $request->student_grade;
        $grade_model->save();
        Toastr::success("Grade has been edited!");
        return back();
    }
}
