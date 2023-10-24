<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Food;
// use Illuminate\Support\Facades\Log;


class TopController extends Controller
{
    public function index()
    {
        return Inertia::render('Toppage');
    }

    public function store(Request $request)
    {
        $food = new Food();

        $food->name = $request->name;
        $food->categories = $request->categories;
        $food->save();
        // Log::debug($request);
        return $this->list();
    }

    public function list() {
        return Food::all();
    }
}
