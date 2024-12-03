<?php

namespace App\Http\Controllers\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\PostCategoryStoreRequest;
use App\Http\Resources\Collections\PostCategoryCollection;
use App\Http\Resources\Resources\PostCategoryResource;
use App\Models\PostCategory;

class PostCategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = PostCategory::all();
            return new PostCategoryCollection($categories);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(PostCategoryStoreRequest $request)
    {
        try {
            $category = PostCategory::create($request->all());
            return new PostCategoryResource($category);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function update(PostCategoryStoreRequest $request, $id)
    {
        try {
            $category = PostCategory::findOrFail($id);
            $category->update($request->all());
            return new PostCategoryResource($category);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            return (PostCategory::destroy($id)) ?
                response()->json(["message" => "Categoría de post eliminada."], 200) :
                response()->json(["message" => "Categoría no encontrada."], 404);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
