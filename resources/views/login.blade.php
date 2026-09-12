@extends('layouts.auth')
@section('content')
    <div class="form-block">
    <h1 style="margin-bottom: 10px; color: #005aaa;">Авторизация</h1>
    <form class="form-reg-auth" method="POST" action="/login">
        @csrf
        <input type="email" name="email" placeholder="Email" />
        <input type="password" name="password" placeholder="Пароль" />
        <button class="btn-reg-auth" type="submit">Войти</button>
        <div class="block-link">
            <a class="pass-new" href="/forgot-password">Забыли пароль?</a>
            <a class="pass-new" href="/register">Зарегистрироватся</a>
        </div>
    </form>
    </div>
@endsection
