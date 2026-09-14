<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function showLkStudent()
    {
        $student = Auth::user()->student; // берем текущего залогиненного пользователя // достаем профиль студента через связь hasOne
        return view('students', ['student' => $student]); //
    }
}
