<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\FollowerRequest;
use App\Http\Resources\Collections\FollowerCollection;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    //* Seguir
    public function follow(FollowerRequest $request)
    {
        try {
            $user = User::where('id', $request->follower_id)->first();
            $user->follow($request->followed_id);
            return response()->json(['message' => 'Ahora sigues a este usuario.'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    //* Dejar de seguir
    public function unfollow(Request $request)
    {
        try {
            if (empty($request->followed_id)) throw new Error("Falta id de usuario seguido.");
            $user = User::where('id', Auth::user()->id)->first();
            $user->unfollow($request->followed_id);
            return response()->json(['message' => 'Has dejado de seguir a este usuario.'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    //* Usuarios que me siguen (SEGUIDORES)
    public function followers()
    {
        try {
            $user = User::where('id', Auth::user()->id)->first();
            return new FollowerCollection($user->followers);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    //* Usuarios que yo sigo (SEGUIDOS)
    public function usersFollowed()
    {
        try {
            $user = User::where('id', Auth::user()->id)->first();
            return new FollowerCollection($user->followedUsers);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
