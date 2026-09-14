@extends('layouts.auth')
@section('content')
    <div class="form-block">
        <h1 style="margin-bottom: 10px; color: #005aaa;">Смена пароля</h1>
        <form class="form-reg-auth" method="POST" action="/reset-password">
            @csrf
            <input type="password" name="password" placeholder="Введите новый пароль" />
            <input type="hidden" name="token" value="{{$token}}"/>
            <button class="btn-reg-auth" type="submit">Изменить</button>
        </form>
    </div>
@endsection
