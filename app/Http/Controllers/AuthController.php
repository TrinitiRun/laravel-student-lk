<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) { // проверяем соответствие логина и пароля
            return redirect('/students'); // если верно попадаем на шаблон кабинета студента этого пользователя
        } else {
            return back()->withErrors(['email' => 'Неверный логин или пароль']); // иначе показываем ошибку
        }
    }
    public function showLogin()
    {
        return view('login');
    }

    public function register()
    {
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
    }
    public function showRegister()
    {
        return view('register');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // здесь мы получаем авторизованного пользователя -> разлогиниваем его -> убираем его из залогиненных
        $request->session()->invalidate(); //удаление сессии -> все данные которые были в сессии
        $request->session()->regenerateToken(); // Обновляет CSRF-токен -> При выходе меняем его чтобы старые формы не сработали
        return redirect('/login'); // делает редирект на страницу login
    }
}
