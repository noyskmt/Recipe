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
        if(!Schema::hasTable('cheaps')) {
            Schema::create('cheaps', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->timestamps();
                $table->softDeletes();
                $table->integer('price')->nullable();
                $table->text('remarks')->nullable();
                $table->unsignedBigInteger('shop_id');
                $table->unsignedBigInteger('food_id');
                $table->foreign('shop_id')->references('id')->on('shops')->onDelete('cascade');
                $table->foreign('food_id')->references('id')->on('food')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cheaps');
    }
};
