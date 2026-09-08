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
@foreach($students as $people)
    <ul>
        <li>{{$people->firstname}}</li>
        <li>{{$people->lastname}}</li>
        <li>{{$people->secondname}}</li>
        <li>{{$people->group_number}}</li>
        <li>{{$people->faculty}}</li>
        <li>{{$people->course}}</li>
    </ul>
@endforeach
</body>
</html>
