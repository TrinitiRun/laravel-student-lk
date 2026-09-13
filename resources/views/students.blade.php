@extends('layouts.app')
@section('content')

    <div class="profile-wrap">
        <div class="profile-top">
            <h1>{{ $student->lastname }} {{ $student->firstname }} {{ $student->secondname }}</h1>
        </div>

        <div class="profile-tiles">
            <div class="tile">
                <i class="fas fa-users"></i>
                <span class="tile-label">Группа</span>
                <span class="tile-value">{{ $student->group_number }}</span>
            </div>
            <div class="tile">
                <i class="fas fa-layer-group"></i>
                <span class="tile-label">Курс</span>
                <span class="tile-value">{{ $student->course }}</span>
            </div>
            <div class="tile">
                <i class="fas fa-university"></i>
                <span class="tile-label">Факультет</span>
                <span class="tile-value">{{ $student->faculty }}</span>
            </div>
        </div>
    </div>
@endsection

