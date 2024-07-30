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
                'name_hiragana' => 'たまねぎ',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'ジャガイモ',
                'name_hiragana' => 'じゃがいも',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'キャベツ',
                'name_hiragana' => 'きゃべつ',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '人参',
                'name_hiragana' => 'にんじん',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'ウインナー',
                'name_hiragana' => 'ういんなー',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'チーズ',
                'name_hiragana' => 'ちーず',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'にんにく',
                'name_hiragana' => 'にんにく',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '卵',
                'name_hiragana' => 'たまご',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'ピーマン',
                'name_hiragana' => 'ぴーまん',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'ソーセージ',
                'name_hiragana' => 'そーせーじ',
                'categories' => '0',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '砂糖',
                'name_hiragana' => 'さとう',
                'categories' => '1',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '塩',
                'name_hiragana' => 'しお',
                'categories' => '1',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '酒',
                'name_hiragana' => 'さけ',
                'categories' => '1',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'バター',
                'name_hiragana' => 'ばたー',
                'categories' => '1',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '醤油',
                'name_hiragana' => 'しょうゆ',
                'categories' => '1',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => '鶏がらスープの素',
                'name_hiragana' => 'とりがらすーぷのもと',
                'categories' => '1',
                'stock' => $faker->numberBetween(0,1),
            ],
            [
                'name' => 'こしょう',
                'name_hiragana' => 'こしょう',
                'categories' => '1',
                'stock' => $faker->numberBetween(0,1),
            ],
        ]);
    }
}
