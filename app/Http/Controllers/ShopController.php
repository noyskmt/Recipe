<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Shop;
use App\Models\Cheap;

class ShopController extends Controller
{
    public function index()
    {
        // return Inertia::render('Shop');

        $first_shop = Shop::first();
        $select_cheaps = Cheap::with('shop')->get();

        return Inertia::render('Shop', [
            "cheaps" => $select_cheaps,
            "firstShop" => $first_shop
        ]);

        //axiosテスト
        // return response()->json($select_cheaps, $first_shop);
    }

    public function store(Request $request)
    {
        $shop = new Shop();

        $shop->name = $request->name;
        $shop->save();
        return $this->list();
    }

    public function list() {
        return shop::all();
    }

    //axiosテスト
    // public function getData() {
    //     $id = Shop::first()->id;
    //     $select_cheaps = Cheap::where("shop_id", $id)->get();

    //     $select_cheaps = Shop::with('cheap')->get();

    //     return response()->json($select_cheaps);
    // } 

}
