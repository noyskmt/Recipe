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
        return Inertia::render('Shop');
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
    public function getData() {
        $first_shop = Shop::first();
        $id = $first_shop->id;
        $select_cheaps = Cheap::where("shop_id", $id)->get();

        return response()->json([
            "cheaps" => $select_cheaps,
            "firstShop" => $first_shop
        ]);
    } 

}
