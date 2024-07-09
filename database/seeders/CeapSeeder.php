<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CeapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // 既存のfood_idとshop_idを取得
        $foodIds = DB::table('food')->pluck('id')->toArray();
        $shopIds = DB::table('shops')->pluck('id')->toArray();

        // food_idをシャッフルして順番に使用
        shuffle($foodIds);

        foreach ($foodIds as $foodId) {
            DB::table('cheaps')->insert([
                [
                    'price' => $faker->numberBetween(1, 1000),
                    'shop_id' => $faker->randomElement($shopIds),
                    'food_id' => $foodId,
                ],
            ]);
        }
    }
}
