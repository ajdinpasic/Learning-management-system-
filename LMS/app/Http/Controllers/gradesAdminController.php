<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Course;
use Illuminate\Http\Request;

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

        ]);
        //dd($request->student);
        // get method for collection
        // select fasade  for eloquent 
        $student = User::where('name', '=', $request->student)->get();
        $course = Course::where('name', '=', $request->course)->where('user_id', '=', $student[0]->id)->get();
        Course::where('id', '=', $course[0]->id)->where('user_id', '=', $student[0]->id)->update(["grade" => $request->grade]);

        return redirect()->route('home');
    }
}
