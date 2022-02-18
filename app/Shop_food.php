<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_food extends Model
{
    //Shopに対するリレーション
    
    //「1対多」の関係なので単数系に
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
