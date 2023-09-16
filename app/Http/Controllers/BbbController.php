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
        return Inertia::render('Bbb');
    }

    public function store(Request $request)
    {
       Bbb::create($request->all());
    }

    // public function store(Request $request)
    // {
    //     $food = new Bbb();
    //     // Log::debug($request);

    //     $food->name = $request->name;
    //     $food->save();
    // }
}
