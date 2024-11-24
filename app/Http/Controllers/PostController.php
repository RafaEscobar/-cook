<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\PostStoreRequest;
use App\Http\Requests\Update\PostUpdateRequest;
use App\Http\Resources\Collections\PostCollection;
use App\Http\Resources\Resources\PostResource;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::all();
            return new PostCollection($posts);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function store(PostStoreRequest $request)
    {
        try {
            $post = Post::create($request->all());
            return new PostResource($post);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function update(PostUpdateRequest $request, Post $post)
    {
        try {
            $post->update($request->all());
            return new PostResource($post);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function show(Post $post)
    {
        try {
            return new PostResource($post);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy(Post $post)
    {
        try {
            $post->delete();
            return response()->json(['message' => 'Entrada eliminada'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
