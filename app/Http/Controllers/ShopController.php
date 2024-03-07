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
        return shop::all();
    }

    // 登録されている備考の取得
    public function remarks() {
        return shop::where('id', '1')->value('remarks');
    }

    public function getData() {
        $first_shop = Shop::first();
        $id = $first_shop->id;

        // cheapsテーブルに登録されている以外のfoodを取得(where,wherehas?)
        // 別で変数を準備する必要がある？
        $food = Food::all();
        // $food = Food::with(['cheaps'])
        //     ->wherehas('cheaps', function($q) {
        //     $q->where('food_id', '!==', 'id');
        // })->get();

        // wherehas=リレーション先の値を抽出
        $select_cheaps = Food::with(['cheaps'])
            ->wherehas('cheaps', function($query) {
            $query->where('shop_id', 1);
        })->get();

        return response()->json([
            "cheaps" => $select_cheaps,
            "firstShop" => $first_shop,
            "food" => $food,
        ]);
    } 

}
