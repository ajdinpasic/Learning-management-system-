# Student management system

## Description 📓 

Student management system is the web application that is meant to be used by professors and students. It offers essential features for students to keep track of their enrolled courses, grades, final grades, total lecture/lab attendance, payment plan and installments. On the other end, professors have ability to enter,edit and delete grade or attendace for each student per enrolled course. Professors can keep track of how many students are attending what course as well as the list of the all students at the university.

## Technologies 💻

I used Bitnami WAMP stack on my WIN 10 for communicating with the MYSQL DB and running web server on my localhost (127.0.0.1) with php modules. <br>
<b> Backend: </b> PHP with LARAVEL framework <br>
<b> Frontend: </b> HTML,CSS,JS with Bootstrap framework

## Installation 🦮

Besides having WAMP, <b> PHP dependency composer </b> is a must.

````php
1. git clone https://github.com/ajdinpasic/Student-management-system-.git
2. cd into the project where you have cloned it.
3. composer install in cmd
4. npm install ( I installed html-duration-js via npm)
5. cp .env.example .env
````
    original .env file is under .gitignore so you should make one by executing this command
    fill out the database creditentials as well as the mail sending creditentials
    
````php
6. code .
7. php artisan key:generate
8. php artisan migrate
9. php artisan serve

````

## Usage :man_scientist:

User needs to sign up and a welcoming email will be sent to its email address. User can log in, if it's successful the home page will be opened with the navigation bar with all main features on the left side. On the right side user can logout and go to its profile and change the profile picture. If you want to have admin permission you should change your "role" column in the "users" table. Everything else remains the same except that you have additional admin features such as seeing all registered users, seeing users enrolled to each course as well as entering, editing, deleting grade and attendance. Admin can conclude final grade as well. For example: Courses section in the nav menu will contain dropdown bar with title "enter final grade" that will lead you to the admin panel. For working with grades go to Grades section and open "enter grade or exam" and so on .... <br> <br>
I manually registered 4 courses directly into the DB and hard-coded their IDs when creating COURSE_REGISTRATIONS objects, so adjust it by youself( have a look at register_controlled.php). <br> <br>
I created folder called avatars in laravel public folder for storing users photos. When new user model is created in DB, user will have no photo and its column 'avatar' will contain value 'default.jpg' , so after creating avatars folder you should add some default photo with that name. When user uploads new photo, it will be saved in public folder.DB should only store relative path of the photo not the actual .jpg, .png or similar file otherwise it would create downtime in performance. You have to create this folder by yourself since I put this folder in .gitignore files to avoid commiting photos to github.

User->Student <br>
Admin->Professor

## Features :grey_exclamation:

- authentication
- authorization
- form validation
- session fixation protection
- csrf protection
- data representation via tables and charts

## Future :package:

- Adding more feature such as departments, semesters, PHP stripe
- Implementing Vue.js

## References :round_pushpin:

Used some layouts and styling from https://github.com/estevanmaito/windmill-dashboard
