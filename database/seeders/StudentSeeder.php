<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;
use App\Models\User;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $user = User::create([
          'name' => 'Лев',
          'email' => 'leva-cheb123@mail.ru',
          'password' => bcrypt('Qwerty12345'),
       ]);

       $user->student()->create([
          'firstname' => 'Лев',
          'lastname' => 'Чеблыков',
          'secondname' => 'Хакимович',
          'faculty' => 'Библиотечно-информационный',
          'course' => 3,
          'group_number' => '03-343',
       ]);

        $user = User::create([
            'name' => 'Альбина',
            'email' => 'albinacheb123@mail.ru',
            'password' => bcrypt('Zxcvb12345'),
        ]);
        $user->student()->create([
            'firstname' => 'Альбина',
            'lastname' => 'Чеблыкова',
            'secondname' => 'Олеговна',
            'faculty' => 'Государственной культурной политики',
            'course' => 3,
            'group_number' => '03-243',
        ]);

    }


}
