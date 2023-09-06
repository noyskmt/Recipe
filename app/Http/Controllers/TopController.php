<?php

namespace App\Http\Controllers;

// use Illuminate\Http\Request;
use Inertia\Inertia;
// use App\Models\Food;

class TopController extends Controller
{
    public function index()
    {
        $hello = 'Hello,World!';
        return Inertia::render('Pages/Toppage', ['hello' => $hello]);
      
        //   Inertia::render('Toppage/Index',['todos' => Todo::latest()->get()]);
    }
}
