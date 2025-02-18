<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FoodSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('food')->insert([
            [
                'user_id' => '1',
                'name' => '玉ねぎ',
                'name_hiragana' => 'たまねぎ',
                'categories' => '0',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'ジャガイモ',
                'name_hiragana' => 'じゃがいも',
                'categories' => '0',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'キャベツ',
                'name_hiragana' => 'きゃべつ',
                'categories' => '0',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'name' => '人参',
                'name_hiragana' => 'にんじん',
                'categories' => '0',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'ウインナー',
                'name_hiragana' => 'ういんなー',
                'categories' => '0',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'チーズ',
                'name_hiragana' => 'ちーず',
                'categories' => '0',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'にんにく',
                'name_hiragana' => 'にんにく',
                'categories' => '0',
                'stock' => '1',
            ],
            [
                'user_id' => '2',
                'name' => '卵',
                'name_hiragana' => 'たまご',
                'categories' => '0',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'ピーマン',
                'name_hiragana' => 'ぴーまん',
                'categories' => '0',
                'stock' => '1',
            ],
            [
                'user_id' => '2',
                'name' => 'ソーセージ',
                'name_hiragana' => 'そーせーじ',
                'categories' => '0',
                'stock' => '1',
            ],
            [
                'user_id' => '2',
                'name' => '砂糖',
                'name_hiragana' => 'さとう',
                'categories' => '1',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'name' => '塩',
                'name_hiragana' => 'しお',
                'categories' => '1',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'name' => '酒',
                'name_hiragana' => 'さけ',
                'categories' => '1',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'バター',
                'name_hiragana' => 'ばたー',
                'categories' => '1',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'name' => '醤油',
                'name_hiragana' => 'しょうゆ',
                'categories' => '1',
                'stock' => '1',
            ],
            [
                'user_id' => '2',
                'name' => '鶏がらスープの素',
                'name_hiragana' => 'とりがらすーぷのもと',
                'categories' => '1',
                'stock' => '1',
            ],
            [
                'user_id' => '1',
                'name' => 'こしょう',
                'name_hiragana' => 'こしょう',
                'categories' => '1',
                'stock' => '1',
            ],
            [
                'user_id' => '3',
                'name' => 'わさび',
                'name_hiragana' => 'わさび',
                'categories' => '1',
                'stock' => '1',
            ],
            [
                'user_id' => '3',
                'name' => '猪肉',
                'name_hiragana' => 'ししにく',
                'categories' => '0',
                'stock' => '1',
            ],
        ]);
    }
}