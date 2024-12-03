<?php

namespace App\Http\Controllers\Recipes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\RecipeStoreRequest;
use App\Http\Requests\Update\RecipeUpdateRequest;
use App\Http\Resources\Collections\RecipeCollection;
use App\Http\Resources\Resources\RecipeResource;
use App\Models\Recipe;

class RecipeController extends Controller
{
    public function index()
    {
        try {
            $recipes = Recipe::all();
            return new RecipeCollection($recipes);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function store(RecipeStoreRequest $request)
    {
        try {
            $recipe = Recipe::create($request->all());
            return new RecipeResource($recipe);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function update(RecipeUpdateRequest $request, Recipe $recipe)
    {
        try {
            $recipe->update($request->all());
            return new RecipeResource($recipe);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function show(Recipe $recipe)
    {
        try {
            return new RecipeResource($recipe);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy(Recipe $recipe)
    {
        try {
            $recipe->delete();
            return response()->json(['message' => 'Receta eliminada'], 200);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
