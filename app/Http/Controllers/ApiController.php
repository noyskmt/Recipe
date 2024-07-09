<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\RecipeList;
use App\Models\Recipe;


class ApiController extends Controller
{
    public function index()
    {
        $rakutenUrl = config('app.rakuten_url');
        $rakutenKey = config('app.rakuten_key');

        $waitTime = 1; //リクエスト間隔
        
        // $recipeArray = RecipeList::all();

        RecipeList::chunk(4, function ($recipes) use ($rakutenUrl, $rakutenKey, $waitTime) {
            foreach ($recipes as $r) {
                $categoryId = $r->category_id;
                $response = Http::withHeaders([
                    'Content-Type' => 'application/json',
                ])->get("{$rakutenUrl}?categoryId={$categoryId}&applicationId={$rakutenKey}");
                
                // \Log::debug($response->body());

                sleep($waitTime);

                // $data = $response->json();
                // $recipe = new Recipe();
                // $recipe-> recipeTitle = $response["recipeTitle"];
                // $recipe-> save();

                $data = $response->json();

                if (isset($data['result'])) {
                    foreach ($data['result'] as $recipeData) {
                        $recipe = new Recipe();
                        $recipe->recipeTitle = $recipeData["recipeTitle"];
                        $recipe->recipeMaterial = $recipeData["recipeMaterial"];
                        $recipe->recipeUrl = $recipeData["recipeUrl"];
                        $recipe->mediumImageUrl = $recipeData["mediumImageUrl"];
                        $recipe->recipeIndication = $recipeData["recipeIndication"];
                        $recipe->save();
                    }
                }
            } 
        });
    }
    
}
