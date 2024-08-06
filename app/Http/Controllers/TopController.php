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
        $food = new Food();

        $food->name = $request->name;
        $food->categories = $request->categories;
        $food->stock = $request->stock;
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

    public function serchRecipe() {
        $stock_food_names = Food::where('stock', 1)->pluck('name_hiragana');
        // $recipe_material =["ういんなー","じゃがいも","たまねぎ","しお","こしょう","ちーず"];
        $recipes = Recipe::all();
        $matching_recipes = [];

        foreach ($recipes as $recipe) {
            $recipe_materials = $this->getRecipeMaterials($recipe->id);

            $match_count = 0;
            // foreach ($stock_food_names as $food_name) {
            //     $result = preg_grep("/$food_name/", $recipe_materials);
            //     if($result) $match_count++;
            // }
            foreach ($stock_food_names as $food_name) {
                if (in_array($food_name, $recipe_materials)) {
                    $match_count++;
                }
            }

            if($match_count === 0) return;

            $recipe_count = count($recipe_materials);
            $match_percentage = $match_count/$recipe_count * 100;
            $count_percent = 65;
            // if($count_percent <= $match_percentage) {
            //     array_push($res_recipes, $recipe_materials);
            // }
            if($count_percent <= $match_percentage) {
                $matching_recipes[] = $recipe;
            }
            return $matching_recipes;
            \Log::debug($match_percentage);
        }
    }
}
