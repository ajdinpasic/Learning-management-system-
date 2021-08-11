<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class datesAdminController extends Controller
{
    //use Validator;

    public function index()
    {
        $allCourses = DB::select("SELECT DISTINCT name AS name FROM courses");
        $allDates = Exam::select('title', 'scheduled_for')->distinct('title')->get();
        return view('layouts.admin_dates', ["allCourses" => $allCourses, "allDates" => $allDates]);
    }

    public function store(Request $request)
    {
        $currentTime = date("Y-m-d h:i:sa");

        $validator = Validator::make($request->all(), [
            'exam_date' => 'required|date|after_or_equal:' . $currentTime,
            'select' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $allStudents = DB::table('users')->join('courses', 'users.id', '=', 'courses.user_id')->where('courses.department', '=', 'IT')->select('users.id')->distinct()->get();
        //dd($allStudents);
        for ($i = 0; $i < $allStudents->count(); $i++) {
            $student_id = $allStudents[$i]->id;
            Exam::create([
                'title' => 'Exam from ' . $request->select,
                'scheduled_for' => $request->exam_date,
                'user_id' => $student_id,
            ]);
        }
        return redirect()->route('home');
    }
    public function delete(Request $request)
    {
        $request->validate([
            "select" => "required",
        ]);
        $exam_title_trimmed = strstr($request->select, '=>', true);
        //dd($exam_title_trimmed);
        $toDelete = Exam::where('title', $exam_title_trimmed)->delete();
        return redirect()->route('home');
    }
    public function update(Request $request)
    {
        $currentTime = date("Y-m-d h:i:sa");

        $validator = Validator::make($request->all(), [
            'exam_date' => 'required|date|after_or_equal:' . $currentTime,
            'select' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        $exam_title_trimmed = strstr($request->select, '=>', true);
        $toUpdate = Exam::where('title', $exam_title_trimmed)->update(['scheduled_for' => $request->exam_date]);

        return redirect()->route('home');
    }
}
