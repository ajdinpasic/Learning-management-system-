<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = [
        'title',
        'grade',
        'user_id',
        'course_id',
    ];

    public function course()
    {
        $this->belongsTo(Course::class);
    }

    public function grade()
    {
        $this->belongsTo(User::class);
    }
}
