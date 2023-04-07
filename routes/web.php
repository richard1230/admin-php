<?php

use Illuminate\Support\Facades\Route;
use \App\Models\User;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
| cookie,session---->here,无app,小程序需求就写在这里
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('email', function () {
    return (new \App\Notifications\EmailValidateCodeNotification())
        ->toMail(User::factory()->make());
});









