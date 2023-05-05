<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create(Request $request)
    {
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        return response()->json([
            'message' => 'Вы успешно зарегистрированы!'
        ]);
    }

    public function auth(Request $request)
    {
        $chek_email = User::where('email', $request->input('email'))->get()->first();
        if ($chek_email != null) {
            $user = User::where('email', $request->input('email'))->get('password')->first();
            if (Hash::check($request->input('password'), $user->password)) {
                $token = Str::random(30);
                User::where('email', $request->input('email'))->update([
                    'token' => $token
                ]);
                return response()->json([
                    'token' => $token
                ]);
            } else {
                return response()->json([
                    'message' => 'Не правильный пароль!'
                ]);
            }
        } else {
            return response()->json([
                'message' => 'Аккаунта не существует или не правильная почта!'
            ]);
        }
    }

    public function logout(Request $request)
    {
        User::where('token', $request->input('token'))->update([
            'token' => NULL
        ]);
        return response()->json([
            'message' => 'Вы вышли из аккаунтка!'
        ]);
    }
}
