<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Food;


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

    public function serchRecipe() {
        $stock_food_name = Food::where('stock', 1)->pluck('name_hiragana');
        // \Log::debug($stock_food_name_hira);
        $recipe_material =["ういんなー","じゃがいも","たまねぎ","しお","こしょう","ちーず"];

        $res_count = 0;
        foreach ($stock_food_name as $food_name) {
            $result = preg_grep("/$food_name/", $recipe_material);
            if($result) $res_count++;
        }

        if($res_count === 0) return;

        $recipe_count = count($recipe_material);
        $match_material= $recipe_count/$res_count*10;
        $count_percent = 65;
        if($count_percent <= $match_material) {
            array_push($res_recipes, $recipe_material);
        }
        // $hoge = json_decode($res_recipes, true);
        // \Log::debug($hoge);
    }
    
}
