<?php

namespace App\Http\Controllers;

use App\Http\Requests\Store\IngredientRequest;
use App\Http\Resources\Collections\IngredientCollection;
use App\Http\Resources\Resources\IngredientResource;
use App\Models\Ingredient;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class IngredientController extends Controller
{
    public function index()
    {
        try {
            $ingredients = Ingredient::all();
            return new IngredientCollection($ingredients);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function store(IngredientRequest $request)
    {
        try {
            $ingredient = Ingredient::create($request->all());
            return new IngredientResource($ingredient);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function update(IngredientRequest $request, $id)
    {
        try {
            $ingredient = Ingredient::findOrFail($id);
            $ingredient->update($request->all());
            return new IngredientResource($ingredient);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "No se encontro el ingrediente."], 404);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $ingredient = Ingredient::findOrFail($id);
            $ingredient->delete();
            return response()->json(["message" => "Ingrediente eliminado."], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "No se encontro el ingrediente."], 404);
        } catch (\Throwable $th) {
            return response()->json(["message" => $th->getMessage()], 500);
        }
    }
}
