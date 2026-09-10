<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Форма регистрации</title>
</head>
<body>
<form method="POST" action="/register">
    @csrf
    <label> Введите ваше Имя:
        <input type="text" name="firstname" placeholder="Имя">
    </label>
    <br>
    <label>Введите вашу Фамилию:
        <input type="text" name="lastname" placeholder="Фамилия">
    </label>
    <br>
    <label>Введите ваше Отчество:
        <input type="text" name="secondname" placeholder="Отчество">
    </label>
    <br>
    <label>Введите Email:
        <input type="email" name="email" placeholder="Email">
    </label>
    <br>
    <label>Введите факультет:
        <input type="text" name="faculty" placeholder="Факультет">
    </label>
    <br>
    <label>Введите курс:
        <input type="number" name="course" placeholder="Курс">
    </label>
    <br>
    <label>Введите номер группы:
        <input type="text" name="group_number" placeholder="Номер группы">
    </label>
    <br>
    <label>Введите пароль:
        <input type="password" name="password" placeholder="Пароль">
    </label>
    <br>
    <button type="submit">Зарегистрироваться</button>
</form>
</body>
</html>
