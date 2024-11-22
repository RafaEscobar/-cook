<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Error;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        try {
            $posts = Post::all();
            return view('posts.index', compact('posts'));
        } catch (\Throwable $th) {
            throw new Error($th->getMessage());
        }
    }

    public function create()
    {
        try {
            return view('posts.create');
        } catch (\Throwable $th) {
            throw new Error($th->getMessage());
        }
    }
}
