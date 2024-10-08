<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\History;
use App\Models\Recipe;

class CalendarController extends Controller
{
    public function add_history_recipe(Request $request) {
        $user = auth()->user();
        $newHistory = new History();
        $newHistory->user_id = $user->id;
        $newHistory->recipe_title = $request['recipe_title'];
        $newHistory->save();
    }

    public function get_history_recipe() {
        $user = auth()->user();
        $historyRecipes = Recipe::whereIn('id', $user->histories()->pluck('recipe_id'))->get();
        return response()->json($historyRecipes);
    }
}
