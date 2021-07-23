<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class GradeEntered extends Mailable
{
    use Queueable, SerializesModels;
    private $course_name;
    private $student_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($student_name, $course_name)
    {
        $this->student_name = $student_name;
        $this->course_name = $course_name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('grade_mail', ["student_name" => $this->student_name, "course_name" => $this->course_name]);
    }
}
