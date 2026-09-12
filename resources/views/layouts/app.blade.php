<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Личный кабинет</title>
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/fontawesome/css/all.min.css">
</head>
<body>
<header>
    <div class="header">
        <div class="header-items">
            <div class="logotip">
                <img src="/img/МГИК.webp" alt="logotip"/>
            </div>
            <div class="header-right">
                <div class="fio">
                    {{$student->lastname}} {{mb_substr($student->firstname, 0, 1)}}.{{mb_substr($student->secondname, 0,1)}}.
                </div>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="btn-logout" type="submit"><i class="fas fa-sign-out-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
</header>
@yield('content')
<footer>
    Подвал
</footer>
</body>
</html>
