<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //Обратная связь belongsTo()
    //Студент принадлежит пользователю
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
