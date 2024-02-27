<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Shop;
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
        // $shop->remarks = $request->remarks;
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

    public function getData() {
        $first_shop = Shop::first();
        $id = $first_shop->id;
        
        $food = Food::all();
        $remarks = Shop::select('remarks')->first();

        // wherehas=リレーション先の値を抽出
        $select_cheaps = Food::with(['cheaps'])
            ->wherehas('cheaps', function($query) {
            $query->where('shop_id', 1);
        })->get();

        // \Log::debug($remarks);

        return response()->json([
            "cheaps" => $select_cheaps,
            "firstShop" => $first_shop,
            "food" => $food,
            "addedRemarks" => $remarks,
        ]);
    } 

}
