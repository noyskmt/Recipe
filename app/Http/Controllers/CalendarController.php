<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\History;

class CalendarController extends Controller
{
    public function add_history_recipe(Request $request) {
        $user = auth()->user();
        $newHistory = new History();
        $newHistory->user_id = $user->id;
        $newHistory->recipe_title = $request['recipe_title'];
        $newHistory->created_at = $request['created_at'];
        $newHistory->save();
    }

    public function get_history_recipe() {
        $user = auth()->user();
        $historyRecipes = History::where('user_id', $user->id)->select('recipe_title', 'created_at', 'recipe_url')->get();
        return response()->json($historyRecipes);
    }
}
