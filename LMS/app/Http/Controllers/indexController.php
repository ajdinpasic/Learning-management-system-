<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $courses = Course::paginate(10);
        $total_courses = count($courses);
        return view('layouts.index', ["courses" => $courses, "total_courses" => $total_courses]);
    }
}
