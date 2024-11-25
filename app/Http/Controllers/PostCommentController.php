<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\PostCommentRequest;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function commentPost(PostCommentRequest $request)
    {
        try {
            Auth::user()->commentPosts()->attach($request->post_id, ["text" => $request->text]);
            return response("", 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function deleteComment(Request $request)
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
