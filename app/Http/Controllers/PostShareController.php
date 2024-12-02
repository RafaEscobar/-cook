<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\PostActionRequest;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostShareController extends Controller
{
    public function store(PostActionRequest $request)
    {
        try {
            $user = Auth::user();
            // @intelephense-ignore
            if ($user->isPostShared($request->post_id)) return response()->json(['message' => "Ya compartiste este post previamente."], 409);
            Auth::user()->sharePosts()->attach($request->post_id);
            return response("", 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = Auth::user();
            if (!$user->isPostShared($id)) return response()->json(['message' => "Aún no has compartido este post."], 409);
            Auth::user()->sharePosts()->detach($id);
            return response("Ya no compartes este post.", 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
