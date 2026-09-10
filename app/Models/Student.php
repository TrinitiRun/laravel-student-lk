<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; // подключение базового класса Model

class Student extends Model // Класс Student наследуется от Model благодаря этому он умеет работать с таблицей student
    //laravel сам понимает связь по имени
{
    public function user()
    { //belongsTo - "принадлежит одному". Студент принадлежит одному пользователю
        return $this->belongsTo(User::class); // Поле user_id в таблице student связывает их
    }
}
