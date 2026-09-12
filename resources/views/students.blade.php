@extends('layouts.app')

@section('content')

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


@endsection
