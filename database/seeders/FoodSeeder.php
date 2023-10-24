<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Database\Factories\FoodFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class FoodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('foods')->insert([
            'name' => Str::random(10),
            'categories' => Int::random(10),
            'stock' => Int::random(10),
            // 'categories' => mt_rand(0,1),
            // 'stock' => mt_rand(0,1),

            // $randomInteger = mt_rand($min = 0, $max = null);

        ]);
    }
}
