<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Recipe;
use App\Models\RecipeCategory;
use App\Models\Step;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RecipeCategorySeed::class,
            PostCategorySeed::class,
            TagSeed::class,
            IngredientsSeed::class
        ]);

        User::factory(10)->create();
        Recipe::factory(10)->create();
        Post::factory(10)->create();
        Step::factory(10)->create();
    }
}
