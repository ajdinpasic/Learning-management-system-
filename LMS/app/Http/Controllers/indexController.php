<?php

namespace App\Http\Controllers;

use App\Models\Course;

class indexController extends Controller
{
    public function index()
    {
        //$courses = Course::where("department", "==", "IT")->paginate(2);
        $courses = Course::where("department", "=", "IT")->paginate(2);
        //dd(count($courses));
        //$total_courses = count($courses);
        return view('layouts.index', ["courses" => $courses]);
    }
}
