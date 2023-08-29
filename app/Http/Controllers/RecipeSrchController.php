<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Recipe;

class RecipeSrchController extends Controller
{
  public function index()
  {
    $hello = 'Hello,World!';
    $hello_array = ['Hello', 'こんにちは', 'ニーハオ'];
    return view('toppage', compact('hello', 'hello_array'));
    // return view('toppage');
    
    
    // Inertia::render('Todos/Index',['todos' => Todo::latest()->get()]);
  }

  // public function ()
  // {


  // }
}