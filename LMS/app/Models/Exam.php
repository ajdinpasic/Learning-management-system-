<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'scheduled_for',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}