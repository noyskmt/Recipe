<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Bbb;
// use Illuminate\Support\Facades\Log;

class BbbController extends Controller
{
    public function index()
    {
        return Inertia::render('Bbb', ['bbb' => Bbb::all()]);
    }

    public function store(Request $request)
    {
        $food = new Bbb();

        $food->name = $request->name;
        $food->save();
        // Log::debug($request);
        // return Inertia::render('Bbb', ['foods' => Bbb::latest()->get()]);
    }
};