<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        /**
         * fakerを利用した自動生成(苗字と名前を使用)
         */
        // \App\Models\Food::factory(30)->create();
        // \App\Models\Shop::factory(10)->create();

        $this->call(FoodSeeder::class);
        $this->call(ShopSeeder::class);
        $this->call(CeapSeeder::class);
        $this->call(RecipeListSeeder::class);
    }
}
