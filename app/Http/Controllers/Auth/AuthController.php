<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\UserLoginRequest;
use App\Http\Requests\Auth\UserRegisterRequest;
use App\Http\Resources\Resource\Auth\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(UserLoginRequest $request)
    {
        try {
            if (Auth::attempt($request->all())) {
                $user = User::where('id', Auth::user()->id)->first();
                $token = $user->createToken('auth_token')->plainTextToken;
                return new UserResource($user, $token);
            } else {
                return response()->json(['message' => 'Credenciales incorrectas']);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 401);
        }
    }

    public function register(UserRegisterRequest $request)
    {
        try {
            $user = User::create($request->all());
            $token = $user->createToken('auth_token')->plainTextToken;
            return new UserResource($user, $token);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function logout()
    {
        try {
            Auth::user()->tokens()->delete();
            return response()->json(['message' => 'Sesión cerrada'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
