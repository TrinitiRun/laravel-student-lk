<?php

use App\Models\User;
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


Route::post('/logout', function (Request $request) { //роут выхода из ЛК (Почему post потому что мы менем состояние)(Request $request - объект запроса)
    Auth::logout(); // здесь мы получаем авторизованного пользователя -> разлогиниваем его -> убираем его из залогиненных
    $request->session()->invalidate(); //удаление сессии -> все данные которые были в сессии
    $request->session()->regenerateToken(); // Обновляет CSRF-токен -> При выходе меняем его чтобы старые формы не сработали
    return redirect('/login'); // делает редирект на страницу login
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


Route::get('/forgot-password', function () {
    return view('forgot-password');
});

Route::post('/forgot-password', function () {
    $user = User::where('email', request('email'))->first(); // ищем email и берем первую запись
    if (!$user) {
        return back()->withErrors(['email' => 'Пользователь с таким email не найден']);
    }
    $token = Str::random(60);
    DB::table('password_reset_tokens')->updateOrInsert(
        ['email' => $user->email],
        ['token' => $token, 'created_at' => now()]
    );
    return back()->with('reset_link', '/reset-password/' . $token);
});




Route::get('/reset-password/{token}', function ($token) {
    return view('reset-password', ['token' => $token]);
});

Route::post('/reset-password', function () {
    $tokenPass = DB::table('password_reset_tokens')->where('token', request('token'))->first();
    if(!$tokenPass) {
        return back()->withErrors(['Что то пошло не так...']);
    }
    $user = User::where('email', $tokenPass->email)->first();
    if(!$user) {
        return back()->withErrors(['Нет такого пользователя']);
    }
    $user->password = bcrypt(request('password'));
    $user->save();

    DB::table('password_reset_tokens')->where('token', request('token'))->delete();
    return redirect('/login')->with('status', 'Пароль успешно изменен');
});
