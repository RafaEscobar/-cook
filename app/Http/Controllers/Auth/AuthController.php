<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Request\Auth\UserRegisterRequest;
use App\Http\Resources\Resource\Auth\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {

    }

    public function register(UserRegisterRequest $request)
    {
        try {
            $user = User::create($request->all());
            $token = $user->createToken('auth_token')->plainTextToken;
            return new UserResource($user, $token);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function logout()
    {

    }

    public function getUser()
    {

    }
}
