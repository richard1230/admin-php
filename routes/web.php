<?php

use App\Models\User;
use App\Notifications\EmailValidateCodeNotification;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Route;
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
//        Notification::send(User::factory()->make(), new EmailValidateCodeNotification(3434));
    return (new EmailValidateCodeNotification(1111))
        ->toMail(User::factory()->make());
});









