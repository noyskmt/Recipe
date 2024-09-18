<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Food;
use App\Models\Recipe;
use App\Models\Favorite;
use App\Models\History;
use App\Models\User;

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
            $recipe_count = count($recipe_materials);
            $match_percentage = $match_count/$recipe_count * 100;
            $count_percent = 65;
            if($match_percentage >= $count_percent) {
                array_push($matching_recipes, $recipe);
            }
            
        }
        // \Log::debug($match_count);
        if($matching_recipes) {
            return $matching_recipes;
        } else {
            return response()->json(['message' => 'レシピが見つかりませんでした'], 404);
        }
    }

    //ユーザーごとのお気に入りレシピを登録
    public function add_favorite_recipe($id) {
        $user = auth()->user();
        $favorite = Favorite::where('user_id', $user->id)->where('recipe_id', $id)->first();
        if ($favorite) {
            // 既にお気に入りの場合は削除
            $favorite->delete();
        } else {
            // お気に入りに追加
            $newFavorite = new Favorite();
            $newFavorite->user_id = $user->id;
            $newFavorite->recipe_id = $id;
            $newFavorite->save();
        }
    }

    public function get_favorite_recipe() {
        $user = auth()->user();
        $favoriteRecipes = Recipe::whereIn('id', $user->favorites()->pluck('recipe_id'))->get();
        return response()->json($favoriteRecipes);
    }

    public function add_history_recipe($id) {
        $user = auth()->user();
        $history = History::where('user_id', $user->id)->where('recipe_id', $id)->first();
        if ($history) {
            // 既にお気に入りの場合は削除
            $history->delete();
        } else {
            // お気に入りに追加
            $newHistory = new History();
            $newHistory->user_id = $user->id;
            $newHistory->recipe_id = $id;
            $newHistory->save();
        }
    }
}
