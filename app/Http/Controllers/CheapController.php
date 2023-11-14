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
        $cheap = new Cheap();

        $cheap->price = $request->price;
        $cheap->remarks = $request->remarks;
        $cheap->shop_id = $request->shop_id;
        $cheap->food_id = $request->food_id;
        $cheap->save();
        return $this->list();
    }

    public function list() {
        return Cheap::all();
    }
}
