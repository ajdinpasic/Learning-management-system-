<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class examsController extends Controller
{
    public function index(Request $request)
    {
        $allExamDates = $request->user()->examDate()->get(['title', 'scheduled_for']);
        //dd($allExamDates);
        return view('layouts.exams', ["allExamDates" => $allExamDates]);
    }
}
