<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ShopSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('shops')->insert([
            [
                'user_id' => '1',
                'name' => '新鮮市場'
            ],
            [
                'user_id' => '1',
                'name' => 'マルキョウ'
            ],
            [
                'user_id' => '1',
                'name' => 'トライアル'
            ],
            [
                'user_id' => '2',
                'name' => 'トキハインダストリー'
            ],
            [
                'user_id' => '2',
                'name' => 'イオン'
            ],
            [
                'user_id' => '2',
                'name' => 'マルミヤ'
            ],
            [
                'user_id' => '3',
                'name' => 'コマツ'
            ],
            [
                'user_id' => '3',
                'name' => '産地直送市場'
            ],
            [
                'user_id' => '3',
                'name' => 'バリュー'
            ],
        ]);
    }
}