<?php

namespace App\Http\Controllers;

use App\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function show(Shop $shop)
    {
    return view('shops.show')->with(['shops' => $shop->getByShop()]);
    }
}
