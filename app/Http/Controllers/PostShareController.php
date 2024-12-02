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
            if (!Auth::user()->isPostShared(Post::findOrFail($request->post_id))) {
                Auth::user()->sharePosts()->attach($request->post_id);
                return response("", 200);
            } else {
                return response()->json(['message' => "Ya guardaste este post previamente"], 409);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            if (Auth::user()->isPostShared(Post::findOrFail($id))) Auth::user()->sharePosts()->detach($id);
            return response("", 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
