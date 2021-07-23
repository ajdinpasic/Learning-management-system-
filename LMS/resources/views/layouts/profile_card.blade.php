<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="/assets/css/profile.css">
	<title>Document</title>
</head>
<body>
	

<div class="card-container">
	<span class="pro">Student</span>
	<img class="round" src="https://randomuser.me/api/portraits/women/79.jpg" alt="user" />
	<h3>{{$user->name}}</h3>
	<h6>City name</h6>
	<p>Information technologies student</p>
	<div class="buttons">
		<button class="primary">
			Send email
		</button> 
	</div>
	<div class="skills">
		<h6>Courses</h6> <br>
		<ul>
			<li>COURSE 1</li>
			<li>COURSE 2</li>
			<li>COURSE 3</li>
			<li>COURSE 4</li>
			<li>COURSE 5</li>
			<li>COURSE 6</li>
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