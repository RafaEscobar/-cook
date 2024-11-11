<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('top_recipes', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('amount_comments');
            $table->tinyInteger('time_Saved');
            $table->tinyInteger('time_shared');
            $table->foreignId('recipe_id')->constrained('recipes')->onDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('top_recipes');
    }
};
