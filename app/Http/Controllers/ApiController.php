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
        // $response = Http::withHeaders([
        //     'Content-Type' => 'application/json',
        // ])->get(config('app.rakuten-url')?categoryId=10-66-50&applicationId=1093932219382914409);
        // return $response;

        $recipeArray = [];
        $recipeArray = RecipeList::all();
        foreach ($recipeArray as $r) {
            $r->category_id;
            $response = Http::withHeaders([
                'Content-Type' => 'application/json',
            ])->get('https://app.rakuten.co.jp/services/api/Recipe/CategoryRanking/20170426?categoryId={$r->category_id}&applicationId=1093932219382914409');
            
            \Log::debug($response);

            $recipe = new Recipe();
            $recipe-> recipeTitle = $response["recipeTitle"];
        } 
    }
    
}
