<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop_food extends Model
{
    
    protected $fillable = [
     'id',
    'shop_id',
    'name',
    'cost',
    'shoumi_date',
    'shouhi_date'
];


    //Shopに対するリレーション
    
    //「1対多」の関係なので単数系に
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
