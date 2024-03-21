<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Shop;
use App\Models\Food;
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

    public function update(Request $request, $id) {
        Shop::find($id)->update($request->all());
        return $this->list();
    }
    
    public function list() {
        return Shop::all();
    }

    // 登録されている備考の取得
    public function remarks() {
        return Shop::where('id', '1')->value('remarks');
    }

    public function getData() {
        $first_shop = Shop::first();
        // $id = $first_shop->id;
        $cheaps_food_ids = Cheap::pluck('food_id');
        $food = Food::all();
        $select_food =  Food::whereNotIn('id', $cheaps_food_ids)->get();

        // wherehas=リレーション先の値を抽出
        $select_cheaps = Food::with(['cheaps'])
            ->wherehas('cheaps', function($query) {
            $query->where('shop_id', 1);
        })->get();

        return response()->json([
            "cheaps" => $select_cheaps,
            "firstShop" => $first_shop,
            "food" => $food,
            "selectFood" => $select_food,
        ]);
    } 

}
