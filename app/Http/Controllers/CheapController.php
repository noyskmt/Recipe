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
        $forms = $request->all();
        foreach ($forms as $val){
            $cheap = new Cheap();
            $cheap->price = $val;
            $cheap->shop_id = $val;
            $cheap->food_id = $val;
            $cheap->save();
        }
        //foreachネスト
        // foreach ($forms as $val1){
        //     foreach ($forms as $val2){
        //         foreach ($forms as $val3){
        //             $cheap = new Cheap();
        //             $cheap->price = $val1;
        //             $cheap->shop_id = $val2;
        //             $cheap->food_id = $val3;
        //             $cheap->save();
        //         }
        //     }
        // }
        return $this->list();
    }

    //一致するものを指定するやり方
    // public function insert(Request $request)
    // {
        // foreach ($request->all() as $key => $val) {
        //     if(preg_match('/cheap/',$key)){
        //         $cheap = new Cheap();
        //         $cheap->price = $val;
        //         $cheap->shop_id = $val;
        //         $cheap->food_id = $val;
        //         $cheap->save();
        //     }
        // }
    //     return $this->list();
    // }

    public function list() {
        return Cheap::all();
    }
}
