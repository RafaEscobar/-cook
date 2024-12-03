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
