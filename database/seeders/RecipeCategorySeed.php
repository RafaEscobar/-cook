<?php

namespace Database\Seeders;

use App\Models\RecipeCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RecipeCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RecipeCategory::create(['category' => 'Desayunos']);
        RecipeCategory::create(['category' => 'Comidas rápidas']);
        RecipeCategory::create(['category' => 'Cenas ligeras']);
        RecipeCategory::create(['category' => 'Postres']);
        RecipeCategory::create(['category' => 'Comida vegana']);
        RecipeCategory::create(['category' => 'Comida sin gluten']);
        RecipeCategory::create(['category' => 'Salsas']);
        RecipeCategory::create(['category' => 'Ensaladas']);
        RecipeCategory::create(['category' => 'Comidas familiares']);
        RecipeCategory::create(['category' => 'Recetas fáciles']);
        RecipeCategory::create(['category' => 'Comida saludable']);
        RecipeCategory::create(['category' => 'Bebidas']);
        RecipeCategory::create(['category' => 'Aperitivos']);
        RecipeCategory::create(['category' => 'Recetas rápidas']);
        RecipeCategory::create(['category' => 'Comida mexicana']);
        RecipeCategory::create(['category' => 'Comida italiana']);
        RecipeCategory::create(['category' => 'Comida asiática']);
        RecipeCategory::create(['category' => 'Comida vegetariana']);
        RecipeCategory::create(['category' => 'Sopas']);
        RecipeCategory::create(['category' => 'Panes']);
        RecipeCategory::create(['category' => 'Comida para niños']);
        RecipeCategory::create(['category' => 'Comida ligera']);
        RecipeCategory::create(['category' => 'Recetas keto']);
        RecipeCategory::create(['category' => 'Comida rápida']);
        RecipeCategory::create(['category' => 'Comida casera']);
        RecipeCategory::create(['category' => 'Recetas de temporada']);
        RecipeCategory::create(['category' => 'Comida de fiesta']);
        RecipeCategory::create(['category' => 'Comida típica']);
        RecipeCategory::create(['category' => 'Comida para llevar']);
        RecipeCategory::create(['category' => 'Desayunos saludables']);
        RecipeCategory::create(['category' => 'Cenas fáciles']);
        RecipeCategory::create(['category' => 'Recetas rápidas']);
        RecipeCategory::create(['category' => 'Postres ligeros']);
        RecipeCategory::create(['category' => 'Comida vegana']);
        RecipeCategory::create(['category' => 'Comidas rápidas']);
        RecipeCategory::create(['category' => 'Recetas vegetarianas']);
        RecipeCategory::create(['category' => 'Sopas caseras']);
        RecipeCategory::create(['category' => 'Recetas caseras']);
        RecipeCategory::create(['category' => 'Comidas familiares']);
        RecipeCategory::create(['category' => 'Ensaladas frescas']);
        RecipeCategory::create(['category' => 'Comida mexicana']);
        RecipeCategory::create(['category' => 'Comida asiática']);
        RecipeCategory::create(['category' => 'Recetas keto']);
        RecipeCategory::create(['category' => 'Comida italiana']);
        RecipeCategory::create(['category' => 'Aperitivos fáciles']);
        RecipeCategory::create(['category' => 'Comida ligera']);
        RecipeCategory::create(['category' => 'Bebidas saludables']);
        RecipeCategory::create(['category' => 'Comida sin gluten']);
        RecipeCategory::create(['category' => 'Salsas caseras']);
        RecipeCategory::create(['category' => 'Recetas para niños']);
        RecipeCategory::create(['category' => 'Comida rápida']);
        RecipeCategory::create(['category' => 'Comida de fiesta']);
        RecipeCategory::create(['category' => 'Comidas saludables']);
        RecipeCategory::create(['category' => 'Recetas de temporada']);
        RecipeCategory::create(['category' => 'Recetas gourmet']);
        RecipeCategory::create(['category' => 'Recetas tradicionales']);
        RecipeCategory::create(['category' => 'Postres veganos']);
    }
}
