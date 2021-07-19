@component('mail::message')
# Hello {{ $userName }}

We are glad You have created account at our webiste. Enjoy !

@component('mail::button', ['url' => 'http://127.0.0.1:8000/login'])
Proceed by clicking here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
