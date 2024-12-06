<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\RecipeCollection;
use App\Models\TopRecipe;

class TopRecipeController extends Controller
{
    public function __invoke()
    {
        try {
            $recipes = TopRecipe::all();
            return new RecipeCollection($recipes);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th], 500);
        }
    }
}
