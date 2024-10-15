<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\RecipeList;
use App\Models\Recipe;
use App\Models\RecipeMaterial;

class ApiController extends Controller
{
    public function index()
    {
        $rakuten_url = config('app.rakuten_url');
        $rakuten_key = config('app.rakuten_key');

        $wait_time = 1; //リクエスト間隔
        
        RecipeList::chunk(4, function ($recipes) use ($rakuten_url, $rakuten_key, $wait_time) {
            foreach ($recipes as $r) {
                $category_id = $r->category_id;
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                ])->get("{$rakuten_url}?categoryId={$category_id}&applicationId={$rakuten_key}");
                
                sleep($wait_time);
                $data = $response->json();
                if (isset($data['result'])) {
                    foreach ($data['result'] as $recipe_data) {
                        $recipe = new Recipe();
                        $recipe->recipe_title = $recipe_data["recipeTitle"];
                        $recipe->recipe_url = $recipe_data["recipeUrl"];
                        $recipe->medium_image_url = $recipe_data["mediumImageUrl"];
                        $recipe->recipe_indication = $recipe_data["recipeIndication"];
                        $recipe->save();

                        $kanjihira_url = config('app.kanjihira_url');
                        $katakanahira_url = config('app.katakanahira_url');

                        foreach ($recipe_data["recipeMaterial"] as $material_name) {
                            //漢字を平仮名に変換
                            $kanji_hira_res = Http::withHeaders([
                                'Content-Type' => 'application/json',
                            ])->get("{$kanjihira_url}?text={$material_name}");
                            //カタカナを平仮名に変換
                            if (preg_match("/^[ァ-ヶー]+$/u", $kanji_hira_res)) {
                                $katakana_hira_res = Http::withHeaders([
                                    'Content-Type' => 'application/json',
                                ])->get("{$katakanahira_url }?input={$kanji_hira_res}");
                                //カタカナを含む時のデータベース登録
                                $recipe_material = $this->recordName($material_name, $katakana_hira_res); 
                            } else {
                                //カタカナを含まない時のデータベース登録
                                $recipe_material = $this->recordName($material_name, $kanji_hira_res);
                            }
                            //食材名を重複しないようにデータベースに登録
                            $recipe->materials()->attach($recipe_material->id);
                        }
                    }
                }
            } 
        });
    }

    public function recordName($material, $hiragana) {
        return RecipeMaterial::firstOrCreate([
            'name' => $material,
            'name_hiragana' => $hiragana,
        ]);
    }
}
