<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Recipe extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'recipe_category_id'
    ];

    public function recipeCategory()
    {
        return $this->belongsTo(RecipeCategory::class);
    }

    public function topRecipes()
    {
        return $this->hasMany(TopRecipe::class);
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class)->withPivot('amount');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function dailyMenus()
    {
        return $this->hasMany(DailyMenu::class);
    }

    public function commentByUser()
    {
        return $this->belongsToMany(User::class, 'recipe_comments')->withPivot('text');
    }

    public function scoreByUser()
    {
        return $this->belongsToMany(User::class, 'user_scores');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function saveByUser()
    {
        return $this->belongsToMany(User::class, 'recipe_saves');
    }

    public function shareByUser()
    {
        return $this->belongsToMany(User::class, 'recipe_shares');
    }

    public function steps()
    {
        return $this->hasMany(Step::class);
    }
}
