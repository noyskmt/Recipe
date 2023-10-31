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
        return Inertia::render('Toppage');
    }

    public function store(Request $request)
    {
        $food = new Food();

        $food->name = $request->name;
        $food->categories = $request->categories;
        $food->stock = $request->stock;
        $food->save();
        // Log::debug($request);
        return $this->list();
    }

    public function list() {
        return Food::all();
    }

    public function stock_tab($request, $id) {
        $food = Food::find($id);
        // $food->stock = !$request->stock;
        $food->stock = ($request->stock) ? 0 : 1; 
        $food->save();
        Log::debug($request);
        return $this->list();


        // if($stock === 1) {
        //     $stock = '0';
        // }else{
        //     $stock  = '1';
        // }
        // return $this->list();
    }
}
