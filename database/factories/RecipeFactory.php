<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Recipe>
 */
class RecipeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(3, true),
            'description' => fake()->sentence(5, true),
            'user_id' => fake()->numberBetween(1, 10),
            'recipe_category_id' => fake()->numberBetween(1, 10)
        ];
    }
}
