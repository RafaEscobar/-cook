<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostCategorySeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PostCategory::create(['category' => 'Alimentación saludable']);
        PostCategory::create(['category' => 'Dieta balanceada']);
        PostCategory::create(['category' => 'Hábitos alimenticios']);
        PostCategory::create(['category' => 'Consejos para una vida saludable']);
        PostCategory::create(['category' => 'Recetas fáciles y saludables']);
        PostCategory::create(['category' => 'Recetas saludables']);
        PostCategory::create(['category' => 'Bienestar general']);
        PostCategory::create(['category' => 'Bienestar personal']);
        PostCategory::create(['category' => 'Nutrición y salud']);
        PostCategory::create(['category' => 'Alimentos naturales']);
        PostCategory::create(['category' => 'Recetas rápidas']);
        PostCategory::create(['category' => 'Comida para el bienestar mental']);
        PostCategory::create(['category' => 'Alimentos energéticos']);
        PostCategory::create(['category' => 'Hidratación']);
        PostCategory::create(['category' => 'Piel saludable']);
        PostCategory::create(['category' => 'Comida para el corazón']);
        PostCategory::create(['category' => 'Mejoran el ánimo']);
        PostCategory::create(['category' => 'Comida consciente']);
        PostCategory::create(['category' => 'Comida y longevidad']);
        PostCategory::create(['category' => 'Prevención de enfermedades']);
        PostCategory::create(['category' => 'Digestión saludable']);
        PostCategory::create(['category' => 'Comida para mantener la energía']);
        PostCategory::create(['category' => 'Sistema inmunológico']);
        PostCategory::create(['category' => 'Especias']);
        PostCategory::create(['category' => 'Nutrición para deportistas']);
        PostCategory::create(['category' => 'Alimentos para mejorar el sueño']);
        PostCategory::create(['category' => 'Cocina saludable para toda la familia']);
        PostCategory::create(['category' => 'Comida vegetariana y vegana']);
        PostCategory::create(['category' => 'Alimentación basada en plantas']);
        PostCategory::create(['category' => 'Dietas']);
        PostCategory::create(['category' => 'Buenos hábitos']);
        PostCategory::create(['category' => 'Bienestar emocional']);
        PostCategory::create(['category' => 'Gestión del estrés']);
        PostCategory::create(['category' => 'Mindfulness y meditación']);
        PostCategory::create(['category' => 'Autocuidado y amor propio']);
        PostCategory::create(['category' => 'Manejo de la ansiedad']);
        PostCategory::create(['category' => 'Consejos para mejorar el estado de ánimo']);
        PostCategory::create(['category' => 'Salud mental y emocional']);
        PostCategory::create(['category' => 'Prácticas para la relajación']);
        PostCategory::create(['category' => 'Cómo aumentar la autoestima']);
        PostCategory::create(['category' => 'Técnicas de respiración para el bienestar']);
    }
}
