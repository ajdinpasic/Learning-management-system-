<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class datesAdminController extends Controller
{
    //use Validator;

    public function index()
    {
        $allCourses = DB::select("SELECT DISTINCT name AS name FROM courses");
        //dd($allCourses);
        return view('layouts.admin_dates', ["allCourses" => $allCourses]);
    }

    public function store(Request $request)
    {
        $currentTime = date("Y-m-d h:i:sa");

        $validator = Validator::make($request->all(), [
            'exam_date' => 'required|date|after_or_equal:' . $currentTime,
            'select' => 'required',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        //dd("ok");
    }
}
