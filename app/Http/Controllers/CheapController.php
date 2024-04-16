<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Cheap;
use App\Models\Food;

class CheapController extends Controller
{
    public function index()
    {
        return Inertia::render('CheapsList');
    }
    public function store(Request $request)
    {
        foreach ($request["forms"] as $form)
        {
            $cheap = new Cheap();
            $cheap->price = $form["price"];
            $cheap->shop_id = $form["shopId"];
            $cheap->food_id = $form["foodId"];
            $cheap->save();
        }
        return Food::with(['cheaps'])
            ->wherehas('cheaps', function($query) use($form){
            $query->where('shop_id', $form["shopId"]);
        })->get();
    }

    public function update(Request $request) 
    {
        foreach ($request["editPrice"] as $editedPrice)
        {
            $cheap =  Cheap::find($editedPrice["id"]);
            $cheap->price = $editedPrice["price"];
            $cheap->update();
        }
        return $this->list();
    }

    public function destroy($id) 
    {
        Cheap::find($id)->delete();
        return $this->list();
    }

    public function list() {
        return Cheap::all();
    }
}
