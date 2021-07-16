<?php

namespace App\Http\Controllers;

use App\Models\Course;

class indexController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(3);
        $total_courses = count($courses);
        return view('layouts.index', ["courses" => $courses, "total_courses" => $total_courses]);
    }
}
