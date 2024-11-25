<?php

namespace App\Http\Controllers;

use App\Http\Resources\Collections\UserCollection;
use App\Models\TopUser;

class TopUserController extends Controller
{
    public function __invoke()
    {
        try {
            $users = TopUser::all();
            return new UserCollection($users);
        } catch (\Throwable $th) {
            return response()->json(['message' => $th->getMessage()], 500);
        }
    }
}
