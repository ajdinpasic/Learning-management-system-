<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Course;
use App\Mail\GradeEntered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class gradesAdminController extends Controller
{
    public function index()
    {
        $allCourses = Course::select('name')->distinct()->paginate(100);
        $allStudents = User::select('name')->paginate(100);
        return view('layouts.admin_grades', ["allCourses" => $allCourses, "allStudents" => $allStudents]);
    }
    public function store(Request $request)
    {
        $request->validate([
            "course" => "required",
            "student" => "required",
            "grade" => "required|numeric|min:00.00|max:100.00",
            "title" => "required",

        ]);
        /*
        // get method for eloquent collection with arrays
        // without get method eloquent builder 
        $student = User::where('name', '=', $request->student)->get();
        $course = Course::where('name', '=', $request->course)->where('user_id', '=', $student[0]->id)->get();
        Course::where('id', '=', $course[0]->id)->where('user_id', '=', $student[0]->id)->update(["grade" => $request->grade]);

        Mail::to($student[0]->email)->send(new GradeEntered($student[0]->name, $course[0]->name));

        return redirect()->route('home'); */

        $student = User::where('name', '=', $request->student)->get();
        $course = Course::where('name', '=', $request->course)->where('user_id', '=', $student[0]->id)->get();

        Grade::create([
            'title' => $request->title . " from " . $request->course,
            'grade' => $request->grade,
            'user_id' => $student[0]->id,
            'course_id' => $course[0]->id,
        ]);
        return redirect()->route('home');
    }
}
