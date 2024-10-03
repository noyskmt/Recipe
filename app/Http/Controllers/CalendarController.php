<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\History;

class CalendarController extends Controller
{
    public function add_history_recipe(Request $request) {
        $user = auth()->user();
        $newHistory = new History();
        $newHistory->user_id = $user->id;
        $newHistory->recipe_title = $request['recipe_title'];
        $newHistory->save();
    }
}
