<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\FollowerRequest;
use App\Models\User;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function addFollower(FollowerRequest $request)
    {
        try {
            $user = User::where('id', $request->follower_id)->first();
            $user->follow($request->followed_id);
            return response()->json(['message' => 'Ahora sigues a este usuario'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function unfollow(Request $request)
    {
        try {
            if (empty($request->followed_id)) throw new Error("Falta id de usuario seguido.");
            $user = User::where('id', Auth::user()->id)->first();
            $user->unfollow($request->followed_id);
            return response()->json(['message' => 'Haz dejado de seguir a este usuario'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
