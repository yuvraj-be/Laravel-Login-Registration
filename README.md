<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).


 Login code with a backend Admin Panel. The code can easily be merged into an existing website. The example pages and codes (login, registration, forgotten password, etc.) included in the code can be customized to be used in your own website or can fit neatly in to your existing website.


Open Terminal or SSH and go to project folder and run below command
    composer install
Change your app name and app URL in below file
    Project Folder
         -- .env file
  
Set your google settings in below directory
    Project Folder
        -- config
               -- services.php file
Open Terminal or SSH and go to project folder and run below list of command
    - php artisan config:cache
    - php artisan config:clear
    - php artisan migrate
    - php artisan db:seed
To run the project use below command
    - php artisan serve
    
    Admin Features
Dashboard (Total Users, Total CMS)
Sign in
Edit Admin Profile
Manage Users
Manage CMS
Module Settings
General Settings

User Features
Login
Signup
Login Using Gmail
Change Password
Edit Profile
