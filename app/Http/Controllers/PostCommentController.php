<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\PostCommentRequest;
use App\Http\Resources\Collections\CommentCollection;
use App\Models\Post;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function index(Request $request)
    {
        try {
            if (!empty($request->post_id)) {
                $post = Post::with('commentByUsers')->findOrFail($request->post_id);
                $comments = $post->commentByUsers->map(function($user){
                    return [
                        "user" => [
                            "id" => $user->id,
                            "name" => "{$user->name} {$user->last_name}",
                            "email" => $user->email
                        ],
                        "comment" => $user->pivot->text
                    ];
                });
                return new CommentCollection($comments);
            } else {
                return response()->json(['message' => 'El id de post es obligatorio'], 422);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function store(PostCommentRequest $request)
    {
        try {
            Auth::user()->commentPosts()->attach($request->post_id, ["text" => $request->text]);
            return response("", 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy(Request $request)
    {
        try {
            if (empty($request->comment_id)) throw new Error("El id del comentario es obligatorio.");
            Auth::user()->commentPosts()->wherePivot('id', $request->comment_id)->detach();
            return response()->json(["message" => "Comentario eliminado"]);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
