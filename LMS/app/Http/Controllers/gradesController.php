<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Grade;
use App\Models\Course;
use Illuminate\Http\Request;

class gradesController extends Controller
{
    public function index(Request $request)
    {
        $courses = $request->user()->course()->select('name')->paginate(10);

        return view('layouts.grades', ["courses" => $courses]);
    }
}
