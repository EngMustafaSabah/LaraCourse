<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>



## About Project 

  This is Task for Interview at E3malBessness Company,this project is SPA (Singel Page App) 

## List Of Tasks

  - CURD Courses.
  - CURD Categories.
  - Search in Home With Axios.
  - APi as Show Courses And Category.

## SetUp Project

  - https://github.com/EngMustafaSabah/LaraCourse.git [git Pull](https://github.com/EngMustafaSabah/LaraCourse.git) .
  - php artisan key:generate  
  - composer install
  - create DB.
  - set same DB name in .env file.
  - php artisan migrate --seed
  - npm install && npm run dev
  - php artisan serv
  - go to your local project url 
  - then login by email is ('eng.m.sabah@gmail.com') password is ('password')

## APIs

  - yourUrl/login  add  email is ('eng.m.sabah@gmail.com') password is ('password') in header in postman or other app to get the Token to connect any other APIs below
  - yourUrl/course  it is get method type to be get all course with Categories related each course 
  - yourUrl/course/(id parmeter)  it is get method type to be get a one course  with Categories related this course 
  - yourUrl/category  it is get method type to be get all category with Courses related each Categories 
  - yourUrl/category/(id parmeter)  it is get method type to be get a one category  with Courses related this Categories 



