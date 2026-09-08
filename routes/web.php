<?php

use App\Models\Student;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/students', function () {
//    return view('students',
//        ['name' => 'Чеблыков Лев Хакимович',
//        'group_number' => '01-234',
//        'course' => 3,
//        'faculty' => "Библиотечно-информационный факультет",
//        'grades' => ['Математика'=> 5, 'Русский язык'=> 4, 'География'=> 3, 'Черчение'=> 5, 'Анг-яз'=> 4],
//        ]);
//});

Route::get('/students', function () {
    return view('students', ['students' => Student::All()]);
});

