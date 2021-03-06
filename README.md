<p align="center"><a href="https://laravel.com" target="_blank"><img src="public/images/logo-laba.png" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About LABA (Laravel Best Accounting)

LABA is a web accounting application build with Laravel framework. LABA is an acronym for "Laravel Best Accounting" and its means "profit" in english.
This application was created to assist companies in achieving their goals, namely profit

## Feature

-   [Invoicing]
-   [Purchasing]
-   [GL Legder](https://laravel.com/docs/routing).
-   [CRM](https://laravel.com/docs/container).

## Installation

1. Download or clone LABA Project
2. Use terminal/command promt - go to the folder application using cd {yourpath}
3. Run "composer install" on your cmd or terminal
4. Copy .env.example file to .env on root folder.
   You can type "copy .env.example .env" if using command prompt Windows
   or "cp .env.example .env" if using terminal Ubuntu
5. Open your .env file and change the database name (DB_DATABASE)
6. Run "php artisan key:generate"
7. Run "php artisan migrate"
8. Run "php artisan serve"
