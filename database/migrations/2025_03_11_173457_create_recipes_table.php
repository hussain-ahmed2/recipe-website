<?php

use App\Models\Category;
use App\Models\User;
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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->json('ingredients'); // Store ingredients as JSON
            $table->json('instructions'); // Store instructions as JSON
            $table->integer('prepTimeMinutes');
            $table->integer('cookTimeMinutes');
            $table->integer('servings');
            $table->string('difficulty');
            $table->string('cuisine');
            $table->integer('caloriesPerServing');
            $table->string('image');
            $table->timestamps();
            
            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Category::class)->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recipes');
    }
};
