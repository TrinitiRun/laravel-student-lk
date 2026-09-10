<?php

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Student;

// подключаем модель студент
use Illuminate\Support\Facades\Auth;

// фасад для авторизации пользователя
use Illuminate\Support\Facades\Route;

// фасад для маршрутов
/*
 Маршруты веб-приложения (ЛК студента)
 */
Route::get('/', function () { // показываем роут на главную страницу laravel
    return view('welcome');
});

// тут у нас роут на кабинет студента
Route::middleware('auth')->group(function () {
    Route::get('/students', function () { // Открытие страницы
        $student = Auth::user()->student; // берем текущего залогиненного пользователя // достаем профиль студента через связь hasOne
        return view('students', ['student' => $student]); // передаем текущего пользователя в шаблон students
    });
});

Route::get('/login', function () { // показываем роут на страницу авторизации
    return view('login');
})->name('login');

Route::post('/login', function () {  // принимает данные через форму методом POST
    if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) { // проверяем соответствие логина и пароля
        return redirect('/students'); // если верно попадаем на шаблон кабинета студента этого пользователя
    } else {
        return back()->withErrors(['email' => 'Неверный логин или пароль']); // иначе показываем ошибку
    }
});

Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
});

Route::get('/register', function () {
    return view('register');
});

Route::post('/register', function () {
    $user = User::create(['name' => request('firstname') . ' ' . request('lastname'), 'email' => request('email'), 'password' => bcrypt(request('password'))]);
    $user->student()->create([
            'firstname' => request('firstname'),
            'lastname' => request('lastname'),
            'secondname' => request('secondname'),
            'faculty' => request('faculty'),
            'course' => request('course'),
            'group_number' => request('group_number')]
    );
    Auth::login($user);
    return redirect('/students');
});
