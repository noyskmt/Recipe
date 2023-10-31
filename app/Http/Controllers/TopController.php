<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Food;


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
        $food->stock = $request->stock;
        $food->save();
        return $this->list();
    }

    public function list() {
        return Food::all();
    }

    public function stock_tab($id) {
        $food = Food::find($id);
        $food->stock = ($food->stock) ? 0 : 1; 
        $food->save();

        // $food->stock = ($food->stock) ? 0 : 1; と同じ↓
        // if($food->stock) {
        //     $food->stock = '0';
        // }else{
        //     $food->stock = '1';
        // }
    }
}
