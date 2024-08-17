<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Food;
use App\Models\Recipe;


class TopController extends Controller
{
    public function index()
    {
        return Inertia::render('Top');
    }

    public function food(Request $request)
    {
        $kanjihira_url = config('app.kanjihira_url');
        $katakanahira_url = config('app.katakanahira_url');

        $food = new Food();

        $food->name = $request->name;
        $food->categories = $request->categories;
        $food->stock = $request->stock;
        //漢字を平仮名に変換
        $kanjihira_res = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->get("{$kanjihira_url}?text={$request["name"]}");
        //カタカナを平仮名に変換
        if (preg_match("/^[ァ-ヶー]+$/u", $kanjihira_res)) {
            $katakanahira_res = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->get("{$katakanahira_url}?input={$kanjihira_res}");
            //カタカナを含む時のデータベース登録
            $food->name_hiragana = $katakanahira_res;
        } else {
            //カタカナを含まない時のデータベース登録
            $food->name_hiragana = $kanjihira_res;
        }
        $food->save();
        return $this->list();
    }

    public function list() {
        return Food::all();
    }

    public function stock_tab($id) {
        $food = Food::find($id);
        $food->stock = ($food->stock) ? 0 : 1; 
        $food->save();
    }

    public function getRecipeMaterials($recipe_id) {
    // リレーションを使ってレシピに関連する食材を取得
        $recipe_materials = Recipe::find($recipe_id)->materials()->pluck('name_hiragana');
        // 配列化
        $recipe_material_array = $recipe_materials->toArray();
        return $recipe_material_array;
    }

    public function serch_recipe() {
        $stock_food_names = Food::where('stock', 1)->pluck('name_hiragana');
        // $recipe_material =["ういんなー","じゃがいも","たまねぎ","しお","こしょう","ちーず"];
        $recipes = Recipe::all();
        $matching_recipes = [];

        foreach ($recipes as $recipe) {
            $recipe_materials = $this->getRecipeMaterials($recipe->id);

            $match_count = 0;
            foreach ($stock_food_names as $food_name) {
                if (preg_grep("/$food_name/", $recipe_materials)) {
                    $match_count++;
                };
            }
            // foreach ($stock_food_names as $food_name) {
            //     if (in_array($food_name, $recipe_materials)) {
            //         $match_count++;
            //     }
            // }

            
            $recipe_count = count($recipe_materials);
            $match_percentage = $match_count/$recipe_count * 100;
            $count_percent = 65;
            if($match_percentage >= $count_percent) {
                array_push($matching_recipes, $recipe);
            }
            // if($match_count === 0) {
            //     $alert = "<script type='text/javascript'>alert('こちらは侍エンジニアです。');</script>";
            //     return $alert;
            // } else {
            //     $recipe_count = count($recipe_materials);
            //     $match_percentage = $match_count/$recipe_count * 100;
            //     $count_percent = 65;
            //     if($match_percentage >= $count_percent) {
            //         array_push($matching_recipes, $recipe);
            //     }
            // }
        }
        // \Log::debug($match_percentage);
        return $matching_recipes;
    }
}
