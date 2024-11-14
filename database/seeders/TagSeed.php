<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Tag::create(['tag' => 'Desayuno']);
        Tag::create(['tag' => 'Cena']);
        Tag::create(['tag' => 'Postres']);
        Tag::create(['tag' => 'Ensaladas']);
        Tag::create(['tag' => 'Sopas']);
        Tag::create(['tag' => 'Bebidas']);
        Tag::create(['tag' => 'Aperitivo']);
        Tag::create(['tag' => 'Galletas']);
        Tag::create(['tag' => 'Pan']);
        Tag::create(['tag' => 'Pasta']);
        Tag::create(['tag' => 'Pizza']);
        Tag::create(['tag' => 'Carnes']);
        Tag::create(['tag' => 'Vegetales']);
        Tag::create(['tag' => 'Vegana']);
        Tag::create(['tag' => 'Keto']);
        Tag::create(['tag' => 'SinGluten']);
        Tag::create(['tag' => 'Fácil']);
        Tag::create(['tag' => 'Casero']);
        Tag::create(['tag' => 'Comida mexicana']);
        Tag::create(['tag' => 'Comida italiana']);
        Tag::create(['tag' => 'Comida asiática']);
        Tag::create(['tag' => 'Comida tradicional']);
        Tag::create(['tag' => 'Saludable']);
        Tag::create(['tag' => 'Dulces']);
        Tag::create(['tag' => 'Light']);
        Tag::create(['tag' => 'Navidad']);
        Tag::create(['tag' => 'Invierno']);
        Tag::create(['tag' => 'Fiesta']);
    }
}
