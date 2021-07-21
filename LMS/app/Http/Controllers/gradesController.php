<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gradesController extends Controller
{
    public function index(Request $request)
    {
        $courses = $request->user()->course()->select('name', 'grade')->paginate(10);
        return view('layouts.grades', ["courses" => $courses]);
    }
}
