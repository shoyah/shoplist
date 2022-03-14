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
        //dd($shop);
        
        return view('blogs/shoplist')->with([ 'shop' => $shop]);
    }
    
    public function create()
    {
        return view('blogs/create');
    }
    
    public function store(ShopRequest $request , Shop_food $shop_food , Shop $shop)//create.blade.phpで作成ボタンを押した後に来るー＞新規作成
    {
        //dd($request);
        //dd($shop);
        //dd($shop_food);
//・空のインスタンスを作成し保存する処理を書く
        $shop_input = $request['shop'];
        //shopをキーに持つリクエスト値を取得する<-このキーはcreate.blade.phpで使用している[shop]今回はnameを取得している。
        //dd($shop_input);  //<-shopのnameが格納されていた。
    
        $shop_input += ['user_id' => $request->user()->id]; 
        //dd($shop_input);
        $shop->name=$shop_input['name'];
        //Shopsテーブルのnameカラムを$shop_inputに保存
        //dd($shop);
        //dd($shop_input);
        //  "name" => "題名"が入っている
        $shop->fill($shop_input)->save();
        //格納したデータを保存
        //dd($shop);   //<-データが格納された。
        $shop_id = $shop->id;
        //$shop_idは$shopのidだよ
        //dd($shop_id);
        $shop_food_id = $shop_food->id;
        //$shop_food_idは$shop_foodのidだよ
        //dd($shop_food_id);
        
        $shop_food_input = $request['shop_food'];
        //shop_foodをキーに持つリクエスト値を取得する<-このキーはcreate.blade.phpで使用している[shop_food]
        //今回はname,cost,shomi_date,shouhi_dateを取得している。
        
        //dd($shop_food_input);
        //   "name" => "商品名"
        //    "cost" => "金額"
        //    "shoumi_date" => "賞味期限"
        //    "shouhi_date" => "消費期限"が入っている。
        
        $shop_food_input += ['user_id' => $request->user()->id]; 
        
        $shop_food_input+=['shop_id'=>$shop_id];
        //$shop_food_inputに$shop_idをshop_idとして格納
        
        $shop_food_input+=['shop_food_id'=>$shop_food_id];
        //$shop_foodのidを格納
        
        $shop_food->fill($shop_food_input)->save();
        //$shop_foodの変数を受け取ったキーごとに上書きする
        //dd($shop_food_input);
        //  "name" => "商品名"
        //  "cost" => "金額"
        //  "shoumi_date" => "賞味期限"
        //  "shouhi_date" => "賞味期限"
        // "shop_id" => 19リレーション先のshopsのid　　　　　　　　が入っている
        
        //dd($shop_food);
        /**
         *  "name" => "おにぎり"
            "cost" => "10"
            "shoumi_date" => "2022-02-03"
            "shouhi_date" => "2022-02-02"
            "shop_id" => 35
            "updated_at" => "2022-02-27 02:21:34"
            "created_at" => "2022-02-27 02:21:34"
            "id" => 45
            が格納されている。
        **/
        $shop_food_id = $shop_food->id;
        //dd($shop_food_id);
        //$shop_food_idに$shop_foodのidが格納された。
        
        
        
        
        return redirect('/shops/' .  $shop_id);
    }
    
    public function show(Shop $shop , Shop_food $shop_food)
    {
        $shop_food=$shop->shop_foods;
        dd($shop_food);
        $cost =$shop_food;
        
        $shop_food = Shop_food::where('cost' , $cost)->get();
        dd($shop_food);
        
        $shop_food = shop_food::where('cost' , $cost);
        dd($shop_food);
        foreach($shop_food as $cost){
            $sum += $cost->cost;
        }
        dd($sum);
        
        
        return view('blogs/show')->with(['shop' => $shop]);
    }
    
    public function add(shop $shop)
    {
        //dd($shop);
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
        //dd($shop);
        return view('blogs/edit')->with([
            'shop' => $shop,
            'shop_food' => $shop_food
            ]);
    }
    
    public function update(AddRequest $request , Shop $shop , Shop_food $shop_food)//edit.blade.phpの保存ボタンを押した後に来るー＞既存データの上書き
    {
//・既存のインスタンスに対して保存する処理を書く
        //dd($shop_food);     //ここでは更新後のデータが格納されていた
        $shop_input = $request['shop'];
        $shop_input += ['user_id' => $request->user()->id];
        $shop->name = $shop_input['name'];
        //dd($shop_input);
        $shop->save();
        
        $shop_id = $shop->id;
        
        $shop_food_id = $shop_food->id; 
        
        $shop_food_input = $request['shop_food'];
        $shop_food_input+=['shop_id'=>$shop_id];
        //dd($shop_food_input);
        $shop_food_input+=['shop_food_id'=>$shop_food_id];
        
        $shop_food->fill($shop_food_input)->save();
        //dd($shop_food_input);
        $shop_food_id = $shop_food->id;
        
        //dd($shop_id);
        return redirect('/shops/' . $shop_id );
    }
    
    
    public function delete(shop_food $shop_food)
    {
    $shop_food->delete();
    return redirect('/');
    }
    
    
    
    
    
    
}
