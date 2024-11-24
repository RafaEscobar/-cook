<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\PostStoreRequest;
use App\Models\Post;
use Error;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(PostStoreRequest $request)
    {
        try {
            $post = Post::create($request->all());
            
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()]);
        }
    }
}
