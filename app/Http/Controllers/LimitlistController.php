<?php

namespace App\Http\Controllers;

use App\User;
use App\Shop;
use App\Shop_food;
use App\Http\Requests\ShopRequest;
use Illuminate\Support\Facades\Auth;

class LimitlistController extends Controller
{
    
    public function index()
    {
        return view('limitlists/index');
    }
    
    public function shoumi( Shop $shop , User $user , Shop_food $shop_food)
    {
        //$shop = \DB::table('shops')->get();
        //DBにあるshopsテーブルの情報を全部取得
        //dd($shop);
        //$shop = \DB::table('shop_foods')->get();
        //DBにあるshop_foodsテーブルの情報を全部取得
        //dd($shop);
        
        $user = Auth::user();
        //dd($user);
        //現在ログインしているユーザーの情報を取得
        $user_id = $user->id;
        //dd($user_id);
        
        date_default_timezone_set('Asia/Tokyo');
        $date = date('Y-m-d');
        //dd($date);
        //今日の日付が入っている。
        
        $shop = Shop_food::where('user_id' , $user_id)->where('shoumi_date' , '>=' , $date)->orderBy('shoumi_date' , 'asc')->get();
        //->where('shoumi_date' , '>=' , $date)->orderBy('shoumi_date' , 'asc')->get();
        //ログインしているユーザーで絞る  
        //dd($shop);
        
        //$shop = Shop::where('user_id' , $user_id)->Shop_food::where('shoumi_date' , '>=' , $date)->orderBy('shoumi_date' , 'asc')->where('user_id' , $user_id)->get();
        //今日の日付よりも前のものを取得->昇順にする->全件取得
        //dd($shop);
   
        
        return view('limitlists/shoumi')->with([ 'shops' => $shop]);
    }
    public function shouhi( Shop $shop , User $user , Shop_food $shop_food)
    {
        $user = Auth::user();
        
        $user_id = $user->id;
        //dd($user_id);
        date_default_timezone_set('Asia/Tokyo');
        $date = date('Y-m-d');
        //dd($date);
        $shop = Shop_food::where('user_id' , $user_id)->where('shoumi_date' , '>=' , $date)->orderBy('shoumi_date' , 'asc')->get();
        //dd($shop);
        return view('limitlists/shouhi')->with([ 'shops' => $shop]);
    }
}
