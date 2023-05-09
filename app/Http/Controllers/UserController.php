<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create(Request $request)
    {
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ])) {
            return redirect('login');
        }

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        Auth::login($user);

        return redirect('/profile')->with('success', 'Вы успешно зарегистрировались!');
    }

    public function auth(Request $request)
    {
        if (!Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ])) {
            return redirect('/login')->with('error', 'Не правильная почта или пароль!');
        }
        $user = Auth::guard('sanctum')->user();
        Auth::login($user);
        $token = $user->createToken('auth_token')->plainTextToken;

        if ($user->role == 1) {
            return  redirect('/admin');
        }
        return redirect('/profile')->with('success', 'Вы успешно авторизовались!');


        // $chek_email = User::where('email', $request->input('email'))->get()->first();
        // if ($chek_email != null) {
        //     $user = User::where('email', $request->input('email'))->get('password')->first();
        //     if (Hash::check($request->input('password'), $user->password)) {
        //         $token = Str::random(30);
        //         User::where('email', $request->input('email'))->update([
        //             'token' => $token
        //         ]);
        //         return redirect('/');
        //     } else {
        //         return response()->json([
        //             'message' => 'Не правильный пароль!'
        //         ]);
        //     }
        // } else {
        //     return response()->json([
        //         'message' => 'Аккаунта не существует или не правильная почта!'
        //     ]);
        // }
    }

    public function logout(Request $request)
    {
        // User::where('token', $request->input('token'))->update([
        //     'token' => NULL
        // ]);
        // return response()->json([
        //     'message' => 'Вы вышли из аккаунтка!'
        // ]);

        //Удаление токенов
        auth('sanctum')->user()->tokens()->delete();
        Auth::logout();
        // переход на страницу
        return redirect('/');
    }
}
