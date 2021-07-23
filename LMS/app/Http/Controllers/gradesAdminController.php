<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class gradesAdminController extends Controller
{
    public function index()
    {
        return view('layouts.admin_grades');
    }
}
