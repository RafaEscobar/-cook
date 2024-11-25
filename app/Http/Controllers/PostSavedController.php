<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\PostActionRequest;

class PostSavedController extends Controller
{
    public function savePost(PostActionRequest $request)
    {
        try {
            $post = Post::where('id', )->first();
            if (!Auth::user()->isPostSaved($post)) {
                Auth::user()->savePosts()->attach($request->post_id);
                return response()->json(['message' => 'Post guardado!'], 200);
            } else {
                return response()->json(["message" => "Ya guardaste este post previamente."], 409);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function deletePost(PostActionRequest $request)
    {
        try {
            Auth::user()->savePosts()->detach($request->post_id);
            return response()->json(["message" => "Post eliminado de guardados"], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
