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
                        "user" => $user,
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

    public function destroy($id)
    {
        try {
            if (empty($id)) throw new Error("El id del comentario es obligatorio.");
            $status = Auth::user()->commentPosts()->wherePivot('id', $id)->detach();
            if ($status) {
                return response()->json(["message" => "Comentario eliminado"]);
            } else {
                return response()->json(["message" => "Error al eliminar el comentario."], 404);
            }
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
