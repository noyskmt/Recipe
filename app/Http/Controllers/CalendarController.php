<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class CalendarController extends Controller
{
    public function add_history_recipe(Request $request) {
        $user = auth()->user();
        // 既存の料理をユーザーIDとhistoryのidで検索
        $existingHistory = History::where('user_id', $user->id)
            ->where('id', $request['id'])
            ->first();

        if ($existingHistory) {
            // 既存のレコードがある場合は更新
            History::find($request['id'])->update($request->all());
        } else {
            // 無い場合は新規作成
            $newHistory = new History();
            $newHistory->user_id = $user->id;
            $newHistory->recipe_title = $request['recipe_title'];
            $newHistory->created_at = $request['created_at'];
            $newHistory->save();
        }
    }

    public function delete_history_recipe(Request $request) {
        $user = auth()->user();
        // 指定されたIDでイベントを削除
        $deleted = History::where('user_id', $user->id)
            ->where('id', $request['id'])
            ->delete();
        
        if ($deleted) {
            return response()->json(['message' => '削除が完了しました'], 200);
        } else {
            return response()->json(['message' => 'イベントが見つかりません'], 404);
        }
    }

    public function get_history_recipe() {
        $user = auth()->user();
        $historyRecipes = History::where('user_id', $user->id)->select('id', 'recipe_title', 'created_at', 'recipe_url')->get();
        return response()->json($historyRecipes);
    }
}
