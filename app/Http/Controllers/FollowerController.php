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
    //* Acción seguir
    public function follow(FollowerRequest $request)
    {
        try {
            $user = Auth::user();
            if ($user->isFollowing($request->followed_id)) return \response()->json(['message' => 'Ya sigues a este usuario'], 409);
            $user->followedUsers()->attach($request->followed_id);
            return response()->json(['message' => 'Ahora sigues a este usuario.'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    //* Acción dejar de seguir
    public function unfollow(FollowerRequest $request)
    {
        try {
            $user = Auth::user();
            if (!$user->isFollowing($request->followed_id)) return \response()->json(['message' => 'No sigues a este usuario'], 409);
            $user->followedUsers()->detach($request->followed_id);
            return response()->json(['message' => 'Has dejado de seguir a este usuario.'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    //* Usuarios que me siguen (SEGUIDORES)
    public function followers()
    {
        try {
            $user = Auth::user();
            return new FollowerCollection($user->followers);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    //* Usuarios que yo sigo (SEGUIDOS)
    public function usersFollowed()
    {
        try {
            $user = Auth::user();
            return new FollowerCollection($user->followedUsers);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
