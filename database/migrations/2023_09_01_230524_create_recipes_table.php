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
        Schema::create('recipes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            
            //料理名
            $table->string('recipeTitle');
            //材料の配列
            $table->string('recipeMaterial');
            //レシピのURL
            $table->string('recipeUrl');
            //料理の画像
            $table->string('mediumImageUrl');
            //調理時間
            $table->string('recipeIndication');
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
