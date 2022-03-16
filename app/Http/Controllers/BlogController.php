<?php

namespace App\Http\Controllers;

use App\User;
use App\Blog;
use App\Shop;
use App\Shop_food;
use App\Http\Requests\ShopRequest;
use App\Http\Requests\AddRequest;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    
    public function index()
    {
        return view('blogs/index');
    }
    
     public function shoplist(shop $shop , User $user)
    {
        $user = Auth::user();
        
        $user_id = $user->id;
        
        $shop = Shop::where('user_id' , $user_id)->get();
        
        return view('blogs/shoplist')->with([ 'shop' => $shop]);
    }
    
    public function create()
    {
        return view('blogs/create');
    }
    
    public function store(ShopRequest $request , Shop_food $shop_food , Shop $shop)
    {
        //空のインスタンスを作成し保存する処理を書く
        $shop_input = $request['shop'];
    
        $shop_input += ['user_id' => $request->user()->id]; 
        
        $shop->name=$shop_input['name'];
        //Shopsテーブルのnameカラムを$shop_inputに保存
        $shop->fill($shop_input)->save();
        //格納したデータを保存
        $shop_id = $shop->id;
        
        $shop_food_id = $shop_food->id;
        
        $shop_food_input = $request['shop_food'];
        
        $shop_food_input += ['user_id' => $request->user()->id]; 
        
        $shop_food_input+=['shop_id'=>$shop_id];
        
        $shop_food_input+=['shop_food_id'=>$shop_food_id];
        
        $shop_food->fill($shop_food_input)->save();
        //$shop_foodの変数を受け取ったキーごとに上書きする
        $shop_food_id = $shop_food->id;

        return redirect('/shops/' .  $shop_id);
    }
    
    public function show(Shop $shop , Shop_food $shop_food)
    {
        
        $shop_foods=$shop->shop_foods;
        
        $sum = 0;
        foreach($shop_foods as $shop_food){
            $shop_food->cost;
            
            $sum += $shop_food->cost;
        }
        
        return view('blogs/show')->with([
            'shop' => $shop,
            'sum' => $sum
        ]);
    }
    
    public function add(shop $shop)
    {
        return view('blogs/add')->with([ 'shop' => $shop]);
    }
    
    public function aditional(AddRequest $request , Shop $shop , Shop_food $shop_food)
    {
        $shop_id = $shop->id;
        
        $shop_food_input = $request['shop_food'];
        
        $shop_food_input+=['shop_id'=>$shop_id];
        $shop_food_input += ['user_id' => $request->user()->id]; 
        
        $shop_food->fill($shop_food_input)->save();
        
        return redirect('/shops/' .  $shop_id);
        
    }    
    
    
    
    public function edit(shop $shop , shop_food $shop_food)
    {
        return view('blogs/edit')->with([
            'shop' => $shop,
            'shop_food' => $shop_food
        ]);
    }
    
    public function update(AddRequest $request , Shop $shop , Shop_food $shop_food)
    {
        $shop_input = $request['shop'];
        $shop_input += ['user_id' => $request->user()->id];
        $shop->name = $shop_input['name'];
        $shop->save();
        
        $shop_id = $shop->id;
        
        $shop_food_id = $shop_food->id; 
        
        $shop_food_input = $request['shop_food'];
        $shop_food_input+=['shop_id'=>$shop_id];
        
        $shop_food_input+=['shop_food_id'=>$shop_food_id];
        
        $shop_food->fill($shop_food_input)->save();
        
        $shop_food_id = $shop_food->id;
        
        return redirect('/shops/' . $shop_id );
    }
    
    
    public function delete(shop_food $shop_food)
    {
        $shop_food->delete();
        return redirect('/');
    }
}
