<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAttendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'present',
        "user_id",
        "course_id",
    ];
}
