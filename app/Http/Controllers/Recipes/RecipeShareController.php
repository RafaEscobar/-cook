<?php

namespace App\Http\Controllers\Recipes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\RecipeActionsRequest;
use App\Http\Resources\Collections\RecipeActionsCollection;
use Illuminate\Support\Facades\Auth;

class RecipeShareController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            return new RecipeActionsCollection($user->shareRecipes);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(RecipeActionsRequest $request)
    {
        try {
            $user = Auth::user();
            if ($user->isRecipeShared($request->recipe_id)) return response()->json(["message" => "Ya has compartido esta receta."], 409);
            $user->shareRecipes()->attach($request->recipe_id);
            return response()->json(["message" => "Has compartido esta publicación."], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = Auth::user();
            if (!$user->isRecipeShared($id)) return response()->json(["message" => "Aún no has compartido esta receta."], 409);
            $user->shareRecipes()->detach($id);
            return response()->json(["message" => "Has dejado de compartir esta receta"], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
