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
            
            $table->integer('large_category_id');
            $table->integer('medium_category_id');
            $table->integer('small_category_id');
            //もしくは↓？
            $table->integer('category_id');
            $table->integer('parent_category_id');
            //9月9日時点これでマイグレートしてる再考が必要
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
