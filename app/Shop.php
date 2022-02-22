<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    
    protected $fillable = [
    'id',
    'name'
];

    public function getByLimit()
    {
        // updated_atで降順に並べる
        return $this->orderBy('updated_at', 'DESC')->get();
    }
        
    //Shop_foodsに対するリレーション

    //「1対多」の関係だから'shop_foods'と複数形にする。
}
