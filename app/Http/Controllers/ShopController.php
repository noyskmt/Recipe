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
        $first_shop = Shop::all()->first();
        $id = Shop::first()->id;
        $select_cheaps = Cheap::where("shop_id", $id)->get();

        return Inertia::render('Shop', [
            "cheaps" => $select_cheaps,
            "firstShop" => $first_shop
        ]);

        //axiosテスト
        // return response()->json($select_cheaps);
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

}
