<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\PostCategoryRequest;
use App\Http\Requests\Store\PostCategoryStoreRequest;
use App\Http\Requests\Update\PostCategoryUpdateRequest;
use Illuminate\Http\Request;

class PostCategoryController extends Controller
{
    public function index()
    {
        try {
            
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(PostCategoryStoreRequest $request)
    {
        try {

        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function update(PostCategoryUpdateRequest $request)
    {
        try {

        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {

        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
