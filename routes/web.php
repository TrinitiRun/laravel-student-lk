<?php

use App\Models\Student;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/students', function () {
    $student = Auth::user()->student;
    return view('students', ['student'=> $student]);
});


Route::get('/login', function () {
    return view('login');
});
Route::post('/login', function (){
    if(Auth::attempt(['email'=> request('email'), 'password' => request('password')])) {
        return redirect('/students');
    }else {
        return back()->withErrors(['email'=> 'Неверный логин или пароль']);
    }

});

