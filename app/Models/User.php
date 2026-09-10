<?php

namespace App\Models; // где лежит данный файл

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory; // Фабрика для генерации тестовых полей
use Illuminate\Database\Eloquent\Attributes\Fillable; // Атрибуты новый синтаксис laravel 13
use Illuminate\Database\Eloquent\Attributes\Hidden; // Атрибуты новый синтаксис laravel 13
use Illuminate\Database\Eloquent\Factories\HasFactory;// Позволяет использовать фабрики
use Illuminate\Foundation\Auth\User as Authenticatable;// Боевой класс дает возможность входа
use Illuminate\Notifications\Notifiable;// Позволяет отправлять уведомления

#[Fillable(['name', 'email', 'password'])] // какие поля можно массово добавлять
#[Hidden(['password', 'remember_token'])] // какие поля не показывать при вводе (пароль, токен)

class User extends Authenticatable // класс user наследуется от authenticatable значит умеет логиниться
{
    /** @use HasFactory<UserFactory> */ // работа с фабриками
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime', // автоматически превращается в обьект даты
            'password' => 'hashed', // автоматически хешируется при сохранении
        ];
    }
    public function student() //связь со струдентом
    {
        //У одног есть один
        //Студент принадлежит пользователю
        //hasOne - у одного пользователя один студент
        return $this->hasOne(Student::class);
    }
}
