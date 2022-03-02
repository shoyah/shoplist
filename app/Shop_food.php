<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Shop_food extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
    'user_id',
    'shop_id',
    'name',
    'cost',
    'shoumi_date',
    'shouhi_date'
];

    function getByLimit()
    {
        return $this::with('shop')->orderBy('updated_at', 'DESC')->get();
    }

    //Shopに対するリレーション
    
    //「1対多」の関係なので単数系に
    public function shop()
    {
        return $this->belongsTo('App\Shop');
    }
    
    public function user()
    {
    return $this->belongsTo('App\User');
    }
}
