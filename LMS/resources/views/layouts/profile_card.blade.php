<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/assets/css/profile.css">
	<title>LMS</title>
</head>
<body>
	

<div class="card-container">
	<span class="pro">Student</span>
	<img width="180px"class="round" src="/avatars/{{$user->avatar}}" alt="user" />
	<h3>{{$user->name}} {{""}} {{$user->surname}}</h3>
	<h6>City name</h6>
	<p>Information technologies student</p>
	<div class="buttons">
		<form enctype="multipart/form-data" action="{{ route('user.profile',Auth::user()) }}" method="POST">
		@csrf 
		<button class="primary">
			Change your profile photo
		</button>  
		</a> 
		
	</div>
	<div style="margin: 1em 0em 0em 1.5em">
	<input name="user_avatar" type="file">
	@error('user_avatar')
                  <p style="color:red;">{{ $message }}</p>
              @enderror
</form>
	</div>
	<div class="skills">
		<h6>Courses</h6> <br>
		<ul>@foreach($courses as $course)
			<li>{{$course->name}} </li>@endforeach
		</ul>
	</div>
</div>

<footer>
	<p>
		Return back to 
		<a href="{{ route('home') }}">home page</a>
	</p>
</footer>

</body>
</html>