<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use Database\Factories\FoodFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create();
        DB::table('food')->insert([
            // 'name' => Str::random(10),
            // 'categories' => Int::random(10),
            // 'stock' => Int::random(10),
            [
                'name' => '玉ねぎ',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'ジャガイモ',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'キャベツ',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '人参',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '豚こま',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '牛肉',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '赤魚',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'もやし',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'なす',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '砂糖',
                'categories' => '1',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '塩',
                'categories' => '1',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '酒',
                'categories' => '1',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'みりん',
                'categories' => '1',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '醤油',
                'categories' => '1',
                'stock' => $faker->numberBetween(0,1),
            ],
            
        ]);
    }
}
