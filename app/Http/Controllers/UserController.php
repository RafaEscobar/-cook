<?php

namespace App\Http\Controllers;

use App\Http\Requests\Update\UserUpdateRequest;
use App\Http\Resources\Resource\Auth\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function update(UserUpdateRequest $request, User $user)
    {
        try {
            $user->update($request->all());
            return new UserResource($user);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function show(User $user)
    {
        try {
            return new UserResource($user);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }

    public function destroy(User $user)
    {
        try {
            $user->delete();
            return response()->json(['message' => 'El usuario ha sido eliminado']);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
