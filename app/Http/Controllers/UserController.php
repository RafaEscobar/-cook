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
}
