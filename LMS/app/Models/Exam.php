<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'scheduled_for',
        'classroom_number',
        'duration_time',
        'proctor',
        'course_id',
        'title',
    ];
}
