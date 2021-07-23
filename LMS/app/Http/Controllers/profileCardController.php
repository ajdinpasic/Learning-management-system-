<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class profileCardController extends Controller
{
    public function index(User $user)
    {
        return view('layouts.profile_card', ["user" => $user]);
    }
}
