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