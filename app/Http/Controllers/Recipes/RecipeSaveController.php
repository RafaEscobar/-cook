<?php

namespace App\Http\Controllers\Recipes;

use App\Http\Controllers\Controller;
use App\Http\Requests\Store\RecipeSaveStoreRequest;
use App\Http\Resources\Collections\RecipeSaveCollection;
use Illuminate\Support\Facades\Auth;

class RecipeSaveController extends Controller
{
    public function index()
    {
        try {
            $user = Auth::user();
            return new RecipeSaveCollection($user->saveRecipes);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(RecipeSaveStoreRequest $request)
    {
        try {
            $user = Auth::user();
            if ($user->isRecipeSaved($request->recipe_id)) return response()->json(["message" => "Ya has guardado previamente esta receta."], 409);
            $user->saveRecipes()->attach($request->recipe_id);
            return response()->json(["message" => "Receta guardada."], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = Auth::user();
            if (!$user->isRecipeSaved($id)) return response()->json(["message" => "Aún no has guardado esta receta."], 409);
            $user->saveRecipes()->detach($id);
            return response()->json(["message" => "Has eliminado este receta de tus guardados."], 200);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
