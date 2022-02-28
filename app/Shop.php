<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    
    protected $fillable = [
    'name'
];

    public function getByLimit()
    {
        // updated_atで降順に並べる
        return $this->blogs()->with('shop')->orderBy('updated_at', 'DESC')->get();
    }
        
    //Shop_foodsに対するリレーション

    //「1対多」の関係だから'shop_foods'と複数形にする。
    
    public function shop_foods()   
    {
    return $this->hasMany('App\Shop_food');  
    }
}
