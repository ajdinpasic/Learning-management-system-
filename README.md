# Student management system

## Description

Student management system is the web application that is meant to be used by professors and students. It offers essential features for students to keep track of their enrolled courses, grades, final grades, total lecture/lab attendance, payment plan and installments. On the other end, professors have ability to enter,edit and delete grade or attendace for each student per enrolled course. Professors can keep track of how many students are attending what course as well as the list of the all students at the university.

## Technologies

I used Bitnami WAMP stack on my WIN 10 for communicating with the MYSQL DB and running web server on my localhost (127.0.0.1) with php modules. <br>
<b> Backend: </b> PHP with LARAVEL framework <br>
<b> Frontend: </b> HTML,CSS,JS with Bootstrap framework

## Installation

Besides having WAMP, <b> PHP dependency composer </b> is a must.

````
1. git clone https://github.com/ajdinpasic/Student-management-system-.git
2. cd into the project where you have cloned it.
3. composer install in cmd
4. npm install ( I installed html-duration-js via npm)
5. cp .env.example .env
````
    original .env file is under .gitignore so you should make one by executing this command
    fill out the database creditentials as well as the mail sending creditentials
````

6. php artisan key:generate
7. php artisan migrate
8. php artisan serve

````

