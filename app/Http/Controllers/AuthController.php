<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\AuthLoginRequest;
use App\Http\Requests\AuthRegisterRequest;

class AuthController extends Controller
{
    public function register(AuthRegisterRequest $request)
    {
        $user = User::create([
            'name' => "Matthieu",
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return response($user, 201);
    }

    public function login(AuthLoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user->count() == 0)
        {
            return response('Aucun utilisateur connu avec cette adresse mail', 400);
        }

        if(!Hash::check($request->password, $user->password))
        {
            return response(['message' => 'wrong password']);
        }

        $token = $user->createToken('login_token')->plainTextToken;

        return response(['user' => $user, 'token' => $token], 200);
    }
}
