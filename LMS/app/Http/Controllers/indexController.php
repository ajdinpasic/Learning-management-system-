<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class indexController extends Controller
{
    public function index(Request $request)
    {
        //$courses = Course::where("department", "=", "IT")->paginate(2);
        //dd($request->user()->course);
        $courses = $request->user()->course()->paginate(2);
        $total_courses = Course::where("department", "=", "IT")->count();
        return view('layouts.index', ["courses" => $courses, "total_courses" => $total_courses]);
    }
}
