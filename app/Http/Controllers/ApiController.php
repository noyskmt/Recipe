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
        $rakutenUrl = config('app.rakuten_url');
        $rakutenKey = config('app.rakuten_key');

        $waitTime = 1; //リクエスト間隔
        
        RecipeList::chunk(4, function ($recipes) use ($rakutenUrl, $rakutenKey, $waitTime) {
            foreach ($recipes as $r) {
                $categoryId = $r->category_id;
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                ])->get("{$rakutenUrl}?categoryId={$categoryId}&applicationId={$rakutenKey}");
                
                sleep($waitTime);
                $data = $response->json();
                if (isset($data['result'])) {
                    foreach ($data['result'] as $recipeData) {
                        $recipe = new Recipe();
                        $recipe->recipeTitle = $recipeData["recipeTitle"];
                        $recipe->recipeUrl = $recipeData["recipeUrl"];
                        $recipe->mediumImageUrl = $recipeData["mediumImageUrl"];
                        $recipe->recipeIndication = $recipeData["recipeIndication"];
                        $recipe->save();

                        $kanjihiraUrl = config('app.kanjihira_url');
                        $katakanahiraUrl = config('app.katakanahira_url');

                        foreach ($recipeData["recipeMaterial"] as $materialName) {
                            //漢字を平仮名に変換
                            $kanjihiraRes = Http::withHeaders([
                                'Content-Type' => 'application/json',
                            ])->get("{$kanjihiraUrl}?text={$materialName}");
                            //カタカナを平仮名に変換
                            $katakanahiraRes = Http::withHeaders([
                                'Content-Type' => 'application/json',
                            ])->get("{$katakanahiraUrl}?input={$kanjihiraRes}");

                            // if (preg_match("/^[ァ-ヶー]+$/u", $kanjihiraRes)) {
                            //     $katakanahiraRes = Http::withHeaders([
                            //         'Content-Type' => 'application/json',
                            //     ])->get("{$katakanahiraUrl}?input={$kanjihiraRes}");
                            // }

                            //食材名を重複しないようにデータベースに登録
                            $recipeMaterial = RecipeMaterial::firstOrCreate([
                                'name' => $materialName,
                                'name_hiragana' => $katakanahiraRes,
                            ]);
                            $recipe->materials()->attach($recipeMaterial->id);
                        }
                    }
                }
            } 
        });
    }
}
