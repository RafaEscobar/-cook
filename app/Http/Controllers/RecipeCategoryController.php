<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\RecipeCategoryRequest;
use App\Http\Resources\Collections\RecipeCategoryCollection;
use App\Http\Resources\Resources\RecipeCategoryResource;
use App\Models\PostCategory;
use App\Models\RecipeCategory;
use Auth;

class RecipeCategoryController extends Controller
{
    public function index()
    {
        try {
            $categories = RecipeCategory::all();
            return new RecipeCategoryCollection($categories);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(RecipeCategoryRequest $request)
    {
        try {
            $category = RecipeCategory::create($request->all());
            return new RecipeCategoryResource($category);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function update(RecipeCategoryRequest $request, $id)
    {
        try {
            $category = RecipeCategory::findOrFail($id);
            $category->update($request->all());
            return response()->json(["message" => "Categoría actualizada."], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            return (RecipeCategory::destroy($id)) ?
            response()->json(["message" => "Categoría eliminada."], 200) :
            response()->json(["message" => "Categoría no encontrada"], 404);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
