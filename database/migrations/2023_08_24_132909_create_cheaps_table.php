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
        Schema::table('cheaps', function (Blueprint $table) {
            $table->string('name');
            $table->integer('price');
            $table->text('remarks');
            $table->string('shop_id');
            $table->string('food_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cheaps', function (Blueprint $table) {
            //
        });
    }
};
