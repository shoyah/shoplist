<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    
    protected $fillable = [
    'name',
    'user_id'
    ];

    public function getByLimit()
    {
        // updated_atで降順に並べる
        return $this->with('user')->orderBy('updated_at', 'asc')->get();
    }
        
    //Shop_foodsに対するリレーション

    //「1対多」の関係だから'shop_foods'と複数形にする。
    
    public function shop_foods()   
    {
    return $this->hasMany('App\Shop_food');  
    }
    
    public function user()
    {
    return $this->belongsTo('App\User');
    }
}
