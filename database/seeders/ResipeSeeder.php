<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ResipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('recipes')->insert([
            [
                'recipeTitle' => '簡単節約！ウインナーとキャベツのガリバタ炒め',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1920015784/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/ce13e10d439507c34d8aa7e40a8cca52e2d8e611.23.2.3.2.jpg?thum=54',
                'recipeIndication' =>'約10分',
            ],
            [
                'recipeTitle' => '顆粒だしと麺つゆが隠し味♪ウインナーオムライス♡',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1220013965/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/ec2f062cfb5596396b642d14ccef83b21d0b7f81.33.2.3.2.jpg?thum=54',
                'recipeIndication' =>'約10分',
            ], 
            [
                'recipeTitle' => 'ビールのおつまみ☆ギョニソ詰めゴーヤの天ぷら♪',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1150010271/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/69e42ad758f404e9e7ad60448b890dc5e081ab9d.13.2.3.2.jpg?thum=54',
                'recipeIndication' =>'約15分',
            ], 
            [
                'recipeTitle' => 'ピーマンとウインナーの卵炒め',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1330006800/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/71c191d392048229a244e33c702ec92081a767a3.45.2.3.2.jpg?thum=54',
                'recipeIndication' =>'指定なし',
            ],
            [
                'recipeTitle' => '5分でできちゃう!じゃがいもとベーコンの簡単炒め物',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1760019183/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/9f83a2ca3fd502ccd34e55f3137779e218247d2e.77.2.3.2.jpg?thum=54',
                'recipeIndication' =>'5分以内',
            ], 
            [
                'recipeTitle' => '絶品！冬瓜とベーコンの中華スープ',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1050009202/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/2f3b84220e186a3337cd77b0bc09ef6ae2c4466f.46.9.3.3.jpg?thum=54',
                'recipeIndication' =>'約30分',
            ],
            [
                'recipeTitle' => '豆腐と卵とベーコンのコンソメスープ',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1300022864/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/5a3949464518a6a54b00b7209aae1f6922ca19e9.11.2.3.2.jpg?thum=54',
                'recipeIndication' =>'約15分',
            ],
            [
                'recipeTitle' => 'ゴーヤのチーズオムレツ',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1340029805/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/77d2291b485af399be3b155c00b54ffc3061bfc9.23.9.3.3.jpg?thum=54',
                'recipeIndication' =>'約10分',
            ],
            [
                'recipeTitle' => 'シンプルが一番☆砂肝の塩胡椒炒め。おつまみに☆',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1410004590/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/3009fba16eea7fc07fa80507e31d0a2b992be71e.19.2.3.2.jpg?thum=54',
                'recipeIndication' =>'約10分',
            ],
            [
                'recipeTitle' => '＜定番シリーズ＞ご飯が進む！とろ～り牛すじ煮込み',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1260005620/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/caacb293d43ef9f57628370bd7457b1356e96810.04.2.3.2.jpg?thum=54',
                'recipeIndication' =>'1時間以上',
            ],
            [
                'recipeTitle' => '☆★焼肉やさんに聞いたタン塩の味付け♪★☆',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1040003683/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/4e807c8d06d23b54e24a644e4af2d1a8ac0dfc93.08.2.3.2.jpg?thum=54',
                'recipeIndication' =>'指定なし',
            ],
            [
                'recipeTitle' => '夏バテ気味のお父さんへ。鶏レバーのカリカリおつまみ',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1390006871/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/4bd4184526c14422c638d5d457d75d69a3f30d7e.93.2.3.2.jpg?thum=54',
                'recipeIndication' =>'約10分',
            ],
            [
                'recipeTitle' => '簡単おいしい！我が家のチンジャオロース（青椒肉絲）',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1560004245/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/99344849a9629cc1e6a22ba9bc4b0eb23f89c410.68.2.3.2.jpg?thum=54',
                'recipeIndication' =>'約15分',
            ],
            [
                'recipeTitle' => '★子供大好きレシピ★焼肉のタレ利用/簡単チャプチェ',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1420012505/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/54852c69b85ab60401240b292da400c41bfa851a.09.2.3.2.jpg?thum=54',
                'recipeIndication' =>'約10分',
            ],
            [
                'recipeTitle' => 'ご飯がすすむ！牛肉とたまねぎのオイスターソース炒め',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1260007206/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/e6db0a705a244ebbad36f601b942e6f9cd4566f9.02.2.3.2.jpg?thum=54',
                'recipeIndication' =>'約30分',
            ],
            [
                'recipeTitle' => 'そそる〜♪関西名物！肉吸い',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1140054634/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/64daeee2463112f324d4d6ccbb5feebe85cd8d2f.07.9.3.3.jpg?thum=54',
                'recipeIndication' =>'約10分',
            ],
            [
                'recipeTitle' => '失敗しない！皮のやわらか～い♪ナスの漬物',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1490007097/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/7c2a0504890fa42b472c80c2a754eb4aaf720fdd.83.2.3.2.jpg?thum=54',
                'recipeIndication' =>'5分以内',
            ],
            [
                'recipeTitle' => 'レンジで簡単★カボチャのチーズ焼き',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1770003945/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/a58340c71b5d80fff2ce14545387614df3c911d1.38.2.3.2.jpg?thum=54',
                'recipeIndication' =>'約10分',
            ],
            [
                'recipeTitle' => 'ポテチ越えの美味しさ！！山芋のり塩バタ〜',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1930024180/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/e077438a9b2b2bcd4a101714556aeda732b37b2f.05.9.3.3.jpg?thum=54',
                'recipeIndication' =>'約10分',
            ],
            [
                'recipeTitle' => '簡単！美味！おつまみにも！ピーマンだけ♪',
                'recipeUrl' =>'https://recipe.rakuten.co.jp/recipe/1960006156/?rafcid=wsc_r_cr_1093932219382914409',
                'mediumImageUrl' =>'https://image.space.rakuten.co.jp/d/strg/ctrl/3/a31469dff9775806c68bc7c10c5b3aa4af5a47da.32.2.3.2.jpg?thum=54',
                'recipeIndication' =>'5分以内',
            ],
        ]);
    }
}
