<?php

use App\Http\Controllers\PasswordController;
use App\Http\Controllers\StudentController;
use App\Models\User;
use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use App\Models\Student;

// подключаем модель студент
use Illuminate\Support\Facades\Auth;

// фасад для авторизации пользователя
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

// фасад для маршрутов
/*
 Маршруты веб-приложения (ЛК студента)
 */
Route::get('/', function () { // показываем роут на главную страницу laravel
    return view('welcome');
});

// тут у нас роут на кабинет студента
Route::middleware('auth')->group(function () {
    Route::get('/students', [StudentController::class, 'showLkStudent']);
});


//Показать форму авторизации и сама авторизация
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);


//Разлогинивание пользователя
Route::post('/logout', [AuthController::class, 'logout']);

//Показать форму регистрации и сама регистрация
Route::get('/register', [AuthController::class, 'showRegister']);
Route::post('/register', [AuthController::class, 'register']);

//Показать форму смены пароля и сама проверка
Route::get('/forgot-password', [PasswordController::class, 'showForgotPasswordForm']);
Route::post('/forgot-password',[PasswordController::class, 'forgotPassword']);




Route::get('/reset-password/{token}', [PasswordController::class, 'showResetPassword']);
Route::post('/reset-password', [PasswordController::class, 'resetPassword']);


//Показать профиль студента
Route::get('/profile', [StudentController::class, 'showProfile']);
