<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\PostActionRequest;
use Illuminate\Support\Facades\Auth;

class PostShareController extends Controller
{
    public function sharePost(PostActionRequest $request)
    {
        try {
            Auth::user()->sharePosts()->attach($request->post_id);
            return response("", 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
