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
        if(!Schema::hasTable('food')) {
            Schema::create('food', function (Blueprint $table) {
                $table->bigIncrements('id');
                $table->string('name');
                $table->string('name_hiragana')->nullable();
                $table->integer('categories');
                $table->integer('stock');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
