@component('mail::message')
Hello {{$student_name}}

New grade has been entered into the system from {{$course_name}} course

@component('mail::button', ['url' => 'http://127.0.0.1:8000/users/grades'])
Want to see your grade ? 
@endcomponent

@endcomponent
