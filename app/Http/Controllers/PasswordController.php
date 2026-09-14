<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class PasswordController extends Controller
{
    public function showForgotPasswordForm()
    {
        return view('forgot-password');
    }
    public function forgotPassword()
    {
        $user = User::where('email', request('email'))->first(); // ищем email и берем первую запись
        if (!$user) {
            return back()->withErrors(['email' => 'Пользователь с таким email не найден']);
        }
        $token = Str::random(60);
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $user->email],
            ['token' => $token, 'created_at' => now()]
        );
        return back()->with('reset_link', '/reset-password/' . $token);
    }
    public function showResetPassword($token)
    {
        return view('reset-password', ['token'=>$token]);
    }
    public function resetPassword()
    {
        $tokenPass = DB::table('password_reset_tokens')->where('token', request('token'))->first();
        if(!$tokenPass) {
            return back()->withErrors(['Что то пошло не так...']);
        }
        $user = User::where('email', $tokenPass->email)->first();
        if(!$user) {
            return back()->withErrors(['Нет такого пользователя']);
        }
        $user->password = bcrypt(request('password'));
        $user->save();

        DB::table('password_reset_tokens')->where('token', request('token'))->delete();
        return redirect('/login')->with('status', 'Пароль успешно изменен');
    }
}
