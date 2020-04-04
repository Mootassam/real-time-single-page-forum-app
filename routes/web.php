<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home');
Route::view('/{any}', 'home');
Route::view('/{any}/{any1}', 'home');
Route::view('/{any}/{any1}/{any2}', 'home');
// when you load page like localhost::8000/login, the vue js return error , because he dont know  this route in web.php
//so you have to add the second route , for laravel understand how was your url type , he return home , wth actualty page your reload in
// our example he return login without any error
