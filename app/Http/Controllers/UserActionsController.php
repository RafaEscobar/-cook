<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\SavePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserActionsController extends Controller
{
    public function savePost(SavePostRequest $request)
    {
        try {
            $post = Post::where('id', $request->post_id)->first();
            if (!Auth::user()->isPostSaved($post)) {
                Auth::user()->savePosts()->attach($request->post_id);
                return response()->json(['message' => 'Post guardado!']);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }

    public function deletePost(SavePostRequest $request)
    {
        try {
            Auth::user()->savePosts()->detach($request->post_id);
            return response()->json(["message" => "Post eliminado de guardados"]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
}
