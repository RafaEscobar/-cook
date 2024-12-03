<?php

namespace App\Http\Resources\Collections;

use App\Http\Resources\Resources\RecipeSaveResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipeSaveCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "data" => RecipeSaveResource::collection($this->collection),
            "meta" => [
                "total" => $this->collection->count()
            ]
            ];
    }
}
