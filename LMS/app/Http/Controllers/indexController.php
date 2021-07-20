<?php

namespace App\Http\Controllers;

use App\Models\Course;

class indexController extends Controller
{
    public function index()
    {
        $courses = Course::where("department", "=", "IT")->paginate(2);
        $total_courses = Course::where("department", "=", "IT")->count();
        return view('layouts.index', ["courses" => $courses, "total_courses" => $total_courses]);
    }
}
