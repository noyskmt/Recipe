<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\History;

class CalendarController extends Controller
{
    public function add_history_recipe(Request $request) {
        $user = auth()->user();

        // 既存の料理を日付とユーザーIDで検索
        $existingHistory = History::where('user_id', $user->id)
            ->whereDate('created_at', $request['created_at'])
            ->first();

        if ($existingHistory) {
            // 既存のレコードがある場合は更新
            $existingHistory->recipe_title = $request['recipe_title'];
            $existingHistory->save();
        } else {
            // 無い場合は新規作成
            $newHistory = new History();
            $newHistory->user_id = $user->id;
            $newHistory->recipe_title = $request['recipe_title'];
            $newHistory->created_at = $request['created_at'];
            $newHistory->save();
        }
    }

    public function get_history_recipe() {
        $user = auth()->user();
        $historyRecipes = History::where('user_id', $user->id)->select('recipe_title', 'created_at', 'recipe_url')->get();
        return response()->json($historyRecipes);
    }

    public function delete_history_recipe(Request $request) {
        $user = auth()->user();
        // 指定された日付とユーザーIDに基づいてイベントを削除
        History::where('user_id', $user->id)->whereDate('created_at', $request['created_at'])->delete();
    }
}
