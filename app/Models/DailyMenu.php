<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DailyMenu extends Model
{
    protected $fillable = [
        'date',
        'meal_time',
        'user_id',
        'recipe_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function recipes()
    {
        return $this->belongsTo(Recipe::class);
    }
}
