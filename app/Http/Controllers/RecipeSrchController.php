<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
// use App\Models\Todo;

class RecipeSrchController extends Controller
{
  public function index()
  {
    return view('toppage');
    
    
    // Inertia::render('Todos/Index',['todos' => Todo::latest()->get()]);
  }
}