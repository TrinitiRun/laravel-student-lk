@extends('layouts.auth')
@section('content')
    <div class="form-block">
        <h1 style="margin-bottom: 10px; color: #005aaa">Регистрация</h1>
        <form class="form-reg-auth" method="POST" action="/register">
            @csrf
            <label> Введите ваше Имя:
                <input type="text" name="firstname" placeholder="Имя">
            </label>

            <label>Введите вашу Фамилию:
                <input type="text" name="lastname" placeholder="Фамилия">
            </label>

            <label>Введите ваше Отчество:
                <input type="text" name="secondname" placeholder="Отчество">
            </label>

            <label>Введите Email:
                <input type="email" name="email" placeholder="Email">
            </label>

            <label>Введите факультет:
                <input type="text" name="faculty" placeholder="Факультет">
            </label>

            <label>Введите курс:
                <input type="number" name="course" placeholder="Курс">
            </label>

            <label>Введите номер группы:
                <input type="text" name="group_number" placeholder="Номер группы">
            </label>

            <label>Введите пароль:
                <input type="password" name="password" placeholder="Пароль">
            </label>

            <button class="btn-reg-auth" type="submit">Зарегистрироваться</button>
        </form>
    </div>
@endsection
