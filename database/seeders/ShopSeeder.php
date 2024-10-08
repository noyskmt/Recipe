<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
// use Illuminate\Support\Str;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('shops')->insert([
            // 'name' => Str::random(10),
            [
                'name' => '新鮮市場'
            ],
            [
                'name' => 'マルキョウ'
            ],
            [
                'name' => 'トライアル'
            ],
            [
                'name' => 'トキハインダストリー'
            ],
            [
                'name' => 'イオン'
            ],
        ]);
    }
}
