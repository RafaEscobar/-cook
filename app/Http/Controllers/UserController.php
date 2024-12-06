<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Http\Requests\Update\UserUpdateRequest;
use App\Http\Resources\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    private function findUser($id)
    {
        return User::findOrFail($id);
    }

    public function update(UserUpdateRequest $request, $id)
    {
        try {
            $user = $this->findUser($id);
            $user->update($request->all());
            return new UserResource($user);
        } catch (ModelNotFoundException $e){
            return response()->json(["message" => "Usuario no encontrado"], 404);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function show($id)
    {
        try {
            $user = $this->findUser($id);
            return new UserResource($user);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "Usuario no encontrado"], 404);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $user = $this->findUser($id);
            $user->delete();
            return response()->json(['message' => 'El usuario ha sido eliminado'], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(["message" => "Usuario no encontrado"], 404);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}