<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RecipeCategory extends Model
{
    protected $fillable = ['category'];

    public function recipes()
    {
        return $this->hasMany(Recipe::class);
    }
}
