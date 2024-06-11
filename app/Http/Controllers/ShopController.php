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

    public function update(Request $request) 
    {
        $shop = Shop::find($request["id"]);
        $shop->remarks = $request["remarks"];
        $shop->update();
        return $this->list();
    }
    
    public function list() 
    {
        return Shop::all();
    }

    // 登録されている備考の取得
    public function remarks() 
    {
        $first_shop = Shop::first();
        return Shop::where('id', $first_shop->id)->value('remarks');
    }

    public function getData() 
    {
        $first_shop = Shop::first();
        $cheaps_food_ids = Cheap::pluck('food_id');
        $food = Food::all();
        $select_food =  Food::whereNotIn('id', $cheaps_food_ids)->get();

        // wherehas=リレーション先の値を抽出
        $select_cheaps = Food::with(['cheaps'])
            ->wherehas('cheaps', function($query) use($first_shop){
            $query->where('shop_id', $first_shop->id);
        })->get();

        return response()->json([
            "cheaps" => $select_cheaps,
            "firstShop" => $first_shop,
            "food" => $food,
            "selectFood" => $select_food,
        ]);
    }

    /**
     * 各ショップごとのcheapsリストの取得
     */
    public function changeList($id) 
    {
        $change_cheaps = Food::with(['cheaps'])
            ->wherehas('cheaps', function($query) use($id){
            $query->where('shop_id', $id);
        })->get();

        $change_remarks = Shop::find($id);

        return response()->json([
            "changeCheaps" =>  $change_cheaps,
            "changeRemarks" => $change_remarks,
        ]);
    }

}
