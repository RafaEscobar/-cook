<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\PostActionRequest;
use Auth;

class PostLikeController extends Controller
{
    public function store(PostActionRequest $request)
    {
        try {
            $user = Auth::user();
            if($user->isPostLiked($request->post_id)) return response()->json(["message" => "Ya has dado like a esta publicación"], 409);
            $user->likePosts()->attach($request->post_id);
            return response("", 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = Auth::user();
            if(!$user->isPostLiked($id)) return response()->json(["message" => "No has dado like a esta publicación"], 409);
            $user->likePosts()->detach($id);
            return response()->json(["message" => "Has eliminado tu like de esta publicación"], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
