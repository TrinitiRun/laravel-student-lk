<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Студенты</title>
</head>
<body>
<h1>Приветствую!</h1>
<h3>Вы находитесь в вашем личном кабинете</h3>

<h3>Информация по студентам: </h3>
    <ul>
        <li>{{$student->firstname}}</li>
        <li>{{$student->lastname}}</li>
        <li>{{$student->secondname}}</li>
        <li>{{$student->group_number}}</li>
        <li>{{$student->faculty}}</li>
        <li>{{$student->course}}</li>
    </ul>
</body>
</html>
