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
        $user = Auth::user();
        $user_id = $user->id;
        
        date_default_timezone_set('Asia/Tokyo');
        $date = date('Y-m-d');
        
        //現在ログインしているユーザーの現在日時までのshoumi_dateを取得し昇順にする。
        $shop = Shop_food::where('user_id' , $user_id)->where('shoumi_date' , '>=' , $date)->orderBy('shoumi_date' , 'asc')->get();
        
        return view('limitlists/shoumi')->with([ 'shops' => $shop]);
    }
    
    public function shouhi( Shop $shop , User $user , Shop_food $shop_food)
    {
        $user = Auth::user();
        $user_id = $user->id;
        
        date_default_timezone_set('Asia/Tokyo');
        $date = date('Y-m-d');
        
        $shop = Shop_food::where('user_id' , $user_id)->where('shoumi_date' , '>=' , $date)->orderBy('shoumi_date' , 'asc')->get();
        
        return view('limitlists/shouhi')->with([ 'shops' => $shop]);
    }
}
