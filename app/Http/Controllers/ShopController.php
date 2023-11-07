<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Shop;

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

}
