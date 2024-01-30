<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Shop;
// use App\Models\Cheap;
use App\Models\Food;


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

    //子コンポーネントから親へDBの登録の仕方
    //cheapリスト内の備考をshopテーブルのremarksカラムに入れたい
    //cheapList.vueの更新ボタンとで発火

    // $cheap = new Cheap();
    // $cheap->remarks = $request->remarks;
    // $cheap->save();
    
    public function update(Request $request, $id) {
        Food::find($id)->update($request->all());
      }
    

    public function list() {
        return shop::all();
    }

    public function getData() {
        $first_shop = Shop::first();
        $id = $first_shop->id;
        
        $food = Food::all();
        // $select_cheaps = Food::all();

        // wherehas=リレーション先の値を抽出
        $select_cheaps = Food::with(['cheaps'])
            ->wherehas('cheaps', function($query) {
            $query->where('shop_id', 1);
        })->get();

        // $select_cheaps = Food::with('cheaps')->find(1);
        // $select_cheaps = Cheap::where("shop_id", $id)->get();
        \Log::debug($select_cheaps);

        return response()->json([
            "cheaps" => $select_cheaps,
            "firstShop" => $first_shop,
            "food" => $food,
        ]);
    } 

}
