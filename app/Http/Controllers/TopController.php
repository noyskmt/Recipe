<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Food;
use Illuminate\Support\Facades\Log;


class TopController extends Controller
{
    public function index()
    {
        return Inertia::render('Toppage', ['foods' => Food::all()]);
    }

    public function store(Request $request)
    {
        $food = new Food();

        $food->name = $request->name;
        $food->save();
        Log::debug($request);
    }
}
