<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\PostActionRequest;
use App\Http\Resources\Collections\PostSavedCollection;
use Auth;

class PostSaveController extends Controller
{
    public function index()
    {
        try {
            $posts = Auth::user()->savePosts;
            return new PostSavedCollection($posts);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function store(PostActionRequest $request)
    {
        try {
            $user = Auth::user();
            if ($user->isPostSaved($request->post_id)) return response()->json(["message" => "Ya guardaste este post previamente."], 409);
            $user->savePosts()->attach($request->post_id);
            return response()->json(['message' => 'Post guardado!'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy($post_id)
    {
        try {
            $user = Auth::user();
            if (!$user->isPostSaved($post_id)) return response()->json(['message' => "Aun no has guardado este post."], 409);
            $user->savePosts()->detach($post_id);
            return response()->json(["message" => "Post eliminado de guardados"], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
