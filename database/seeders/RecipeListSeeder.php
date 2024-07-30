<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RecipeListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recipe_list')->insert([
            [
                'category_name' => 'ソーセージ・ウインナー',
                'category_id' => '10-66-50',
            ],
            [
                'category_name' => 'ベーコン',
                'category_id' => '10-68-49',
            ],
            [
                'category_name' => 'ホルモンレバー',
                'category_id' => '10-69-46',
            ],
            [
                'category_name' => '牛肉薄切り',
                'category_id' => '10-275-516',
            ],
            // [
            //     'category_name' => 'その他の牛肉・ビーフ',
            //     'category_id' => '10-275-823',
            // ],
            // [
            //     'category_name' => '牛バラ肉',
            //     'category_id' => '10-275-2134',
            // ],
            // [
            //     'category_name' => '牛小間肉・切り落とし肉',
            //     'category_id' => '10-275-2135',
            // ],
            // [
            //     'category_name' => '豚薄切り肉',
            //     'category_id' => '10-276-517',
            // ],
            // [
            //     'category_name' => '豚こま切れ肉・切り落とし肉',
            //     'category_id' => '10-276-829',
            // ],
            // [
            //     'category_name' => '豚バラ肉',
            //     'category_id' => '10-276-830',
            // ],
            // [
            //     'category_name' => 'その他の豚肉',
            //     'category_id' => '10-276-834',
            // ],
            // [
            //     'category_name' => '豚ヒレ肉',
            //     'category_id' => '10-276-1484',
            // ],
            // [
            //     'category_name' => '豚ロース',
            //     'category_id' => '10-276-1485',
            // ],
            // [
            //     'category_name' => '豚もも肉',
            //     'category_id' => '10-276-1486',
            // ],
            // [
            //     'category_name' => '豚レバー',
            //     'category_id' => '10-276-1487',
            // ],
            // [
            //     'category_name' => '豚ロース薄切り',
            //     'category_id' => '10-276-2138',
            // ],
            // [
            //     'category_name' => '豚肩ロース',
            //     'category_id' => '10-276-2142',
            // ],
            // [
            //     'category_name' => '鶏もも肉',
            //     'category_id' => '10-277-518',
            // ],
            // [
            //     'category_name' => 'その他の鶏肉',
            //     'category_id' => '10-277-834',
            // ],
            // [
            //     'category_name' => '鶏むね肉',
            //     'category_id' => '10-277-1119',
            // ],
            // [
            //     'category_name' => '鶏レバー',
            //     'category_id' => '10-277-1490',
            // ],
            // [
            //     'category_name' => 'その他のひき肉',
            //     'category_id' => '10-278-48',
            // ],
            // [
            //     'category_name' => '牛ひき肉',
            //     'category_id' => '10-278-835',
            // ],
            // [
            //     'category_name' => '豚ひき肉',
            //     'category_id' => '10-278-836',
            // ],
            // [
            //     'category_name' => '合い挽き肉',
            //     'category_id' => '10-278-837',
            // ],
            // [
            //     'category_name' => '鶏ひき肉',
            //     'category_id' => '10-278-838',
            // ],
            // [
            //     'category_name' => '鮭全般',
            //     'category_id' => '11-70-55',
            // ],
            // [
            //     'category_name' => 'さば全般',
            //     'category_id' => '11-72-322',
            // ],
            // [
            //     'category_name' => 'その他のさかな全般',
            //     'category_id' => '11-78-1502',
            // ],
            // [
            //     'category_name' => 'いか全般',
            //     'category_id' => '11-80-68',
            // ],
            // [
            //     'category_name' => 'にんじん',
            //     'category_id' => '12-95-13',
            // ],
            // [
            //     'category_name' => '玉ねぎ',
            //     'category_id' => '12-96-7',
            // ],
            // [
            //     'category_name' => 'じゃがいも',
            //     'category_id' => '12-97-17',
            // ],
            // [
            //     'category_name' => 'キャベツ',
            //     'category_id' => '12-98-1',
            // ],
            // [
            //     'category_name' => 'もやし',
            //     'category_id' => '12-99-318',
            // ],
            // [
            //     'category_name' => 'ピーマン',
            //     'category_id' => '12-101-30',
            // ],
            // [
            //     'category_name' => 'にら',
            //     'category_id' => '12-103-4',
            // ],
            // [
            //     'category_name' => 'えのき',
            //     'category_id' => '12-105-78',
            // ],
            // [
            //     'category_name' => 'エリンギ',
            //     'category_id' => '12-105-339',
            // ],
            // [
            //     'category_name' => 'しそ・大葉',
            //     'category_id' => '12-107-448',
            // ],
            // [
            //     'category_name' => 'なす全般',
            //     'category_id' => '12-447-1518',
            // ],
            // [
            //     'category_name' => 'かぼちゃ',
            //     'category_id' => '12-448-1519',
            // ],
            // [
            //     'category_name' => '大根',
            //     'category_id' => '12-449-1520',
            // ],
            // [
            //     'category_name' => 'きゅうり',
            //     'category_id' => '12-450-1521',
            // ],
            // [
            //     'category_name' => 'さつまいも',
            //     'category_id' => '12-452-1523',
            // ],
            // [
            //     'category_name' => '白菜',
            //     'category_id' => '12-453-1524',
            // ],
            // [
            //     'category_name' => 'トマト全般',
            //     'category_id' => '12-454-1525',
            // ],
            // [
            //     'category_name' => 'ごぼう',
            //     'category_id' => '12-455-1526',
            // ],
            // [
            //     'category_name' => '小松菜',
            //     'category_id' => '12-456-1527',
            // ],
            // [
            //     'category_name' => 'ほうれん草',
            //     'category_id' => '12-457-1528',
            // ],
            // [
            //     'category_name' => 'ブロッコリー',
            //     'category_id' => '12-458-1529',
            // ],
            // [
            //     'category_name' => 'ちくわ',
            //     'category_id' => '13-108-490',
            // ],
            // [
            //     'category_name' => 'わかめ',
            //     'category_id' => '13-113-73',
            // ],
            // [
            //     'category_name' => 'ホットケーキミックス',
            //     'category_id' => '13-480-1628',
            // ],
            // [
            //     'category_name' => 'その他の食材',
            //     'category_id' => '14-126-126',
            // ],
            // [
            //     'category_name' => 'お弁当のおかず全般',
            //     'category_id' => '20-197-970',
            // ],
            // [
            //     'category_name' => 'メイン料理',
            //     'category_id' => '26-262-1076',
            // ],
            // [
            //     'category_name' => '前菜・サラダ',
            //     'category_id' => '26-262-1077',
            // ],
            // [
            //     'category_name' => 'デザート',
            //     'category_id' => '26-262-1081',
            // ],
            // [
            //     'category_name' => '簡単お菓子',
            //     'category_id' => '36-489-1668',
            // ],
            [
                'category_name' => '簡単夕食',
                'category_id' => '36-490-1669',
            ],
            // [
            //     'category_name' => '簡単おつまみ',
            //     'category_id' => '36-491-1670',
            // ],
            // [
            //     'category_name' => '簡単おもてなし料理',
            //     'category_id' => '36-492-1671',
            // ],
            // [
            //     'category_name' => '簡単鶏肉料理',
            //     'category_id' => '36-493-1672',
            // ],
            // [
            //     'category_name' => '簡単豚肉料理',
            //     'category_id' => '36-494-1673',
            // ],
            // [
            //     'category_name' => '簡単魚料理',
            //     'category_id' => '36-495-1674',
            // ],
        ]);
    }
}

