@extends('layouts.app')
@section('content')
    <div class="profile-wrap">
        <div class="profile-top">
            <h1>Доступные разделы</h1>
        </div>

        <div class="profile-tiles">
            <a href="/profile" class="tile">
                <i class="fas fa-user"></i>
                <span class="tile-label">Профиль</span>
            </a>
            <a href="/comming-soon" class="tile">
                <i class="fas fa-book-open"></i>
                <span class="tile-label">Моё обучение</span>
            </a>
            <a href="/comming-soon" class="tile">
                <i class="fas fa-calendar-alt"></i>
                <span class="tile-label">Расписание</span>
            </a>
            <a href="/comming-soon" class="tile">
                <i class="fas fa-book"></i>
                <span class="tile-label">Зачётная книжка</span>
            </a>
            <a href="/comming-soon" class="tile">
                <i class="fas fa-file-alt"></i>
                <span class="tile-label">Справки</span>
            </a>
            <a href="/comming-soon" class="tile">
                <i class="fas fa-wallet"></i>
                <span class="tile-label">Финансы</span>
            </a>
            <a href="/comming-soon" class="tile">
                <i class="fas fa-briefcase"></i>
                <span class="tile-label">Портфолио</span>
            </a>
        </div>
    </div>
@endsection

{{--{{ $student->lastname }} {{ $student->firstname }} {{ $student->secondname }}--}}
{{--{{ $student->faculty }}--}}
{{--{{ $student->course }}--}}
{{--{{ $student->group_number }}--}}
