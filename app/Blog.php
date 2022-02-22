<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

    
    protected $fillable = [
    'shop_id',
    'name',
    'contents_food',
    'contents_money',
    'contents_shoumi',
    'contents_shouhi'
];

    
    //Shopに対するリレーション
    
    //「1対多」の関係なので単数系に
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
}
