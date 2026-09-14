@extends('layouts.auth')
@section('content')
    <div class="form-block">
        <h1 style="margin-bottom: 10px; color: #005aaa;">Востановление пароля</h1>

        <form class="form-reg-auth" method="POST" action="/forgot-password">
            @csrf
            <input type="email" name="email" placeholder="Введите email" />
            <button class="btn-reg-auth" type="submit">Отправить</button>
        </form>
        @if(session('reset_link'))
            <p>Ссылка для сброса: <a href="{{ session('reset_link') }}">{{ session('reset_link') }}</a></p>
        @endif
    </div>
@endsection
