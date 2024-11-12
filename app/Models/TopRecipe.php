<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopRecipe extends Model
{
    protected $fillable = [
        'amount_comments',
        'time_saved',
        'time_shared',
        'recipe_id'
    ];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
