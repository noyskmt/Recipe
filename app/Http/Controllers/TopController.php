<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Food;

class TopController extends Controller
{
    public function index()
    {
        $hello = 'Hello,World!';
        return Inertia::render('Toppage', ['hello' => $hello]);
        // return Inertia::render('Toppage');
      
        //   Inertia::render('Toppage/Index',['todos' => Todo::latest()->get()]);
    }

    public function sidebar(Request $request)
    {
        $food = new Food();
        // Log::debug($request);

        $food->name = $request->name;
        $food->save();
    }
}
