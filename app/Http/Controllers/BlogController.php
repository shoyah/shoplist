<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Shop;
use App\Shop_food;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index()
    {
        return view('blogs/index');
    }
    
     public function shoplist(Shop $shop)
    {
        return view('blogs/shoplist')->with([ 'shops' => $shop->get()]);
    }
    
    public function create()
    {
        return view('blogs/create');
    }
    
    public function store(Request $request , Shop_food $shop_food )
    {
        $input = $request['shop_food'];
        $shop_food->fill($input)->save();
        
        return redirect('/shops/' . $shop->id);
    }
    
    public function show(Shop_food $shop_food)
    {
        return view('blogs/show')->with(['shop' => $shop_food]);
    }
    
    public function edit(Shop_food $shop_food)
    {
        return view('blogs/edit')->with(['blog' => $blog_food]);
    }
    
}
