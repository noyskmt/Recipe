<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Cheap;

class CheapController extends Controller
{
    public function index()
    {
        return Inertia::render('CheapsList');
    }
    public function store(Request $request)
    {
        foreach ($request["forms"] as $form){
            $cheap = new Cheap();
            $cheap->price = $form["price"];
            $cheap->shop_id = $form["shopId"];
            $cheap->food_id = $form["foodId"];
            $cheap->save();
        }
        return $this->list();
    }

    public function update(Request $request, $id) {
        Cheap::find($id)->update($request->all());
        return $this->list();
    }

    public function list() {
        return Cheap::all();
    }
}
