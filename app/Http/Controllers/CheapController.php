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
        // \Log::debug($request);
        // $json = json_encode($request);
        // \Log::debug($json);

        foreach ($request as $vals){
            $cheap = new Cheap();
            $cheap->price = $vals[0];
            $cheap->shop_id = $vals[1];
            $cheap->food_id = $vals[2];
            $cheap->save();
        }

        return $this->list();
    }

    public function list() {
        return Cheap::all();
    }
}
