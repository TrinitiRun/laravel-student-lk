@extends('layouts.auth')
@section('content')
    <h1 style="margin-bottom: 10px; color: #005aaa;">Авторизация</h1>
    <form method="POST" action="/login">
        @csrf
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="password" placeholder="Пароль" />
        <button type="submit">Войти</button>
        <div class="block-link">
            <a class="pass-new" href="/forgot-password">Забыли пароль?</a>
            <a class="pass-new" href="/register">Зарегистрироватся</a>
        </div>
    </form>
@endsection
