<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShopRequest extends FormRequest
{
    
    public function rules()
    {
        return [
            'shop.name' => 'required|string|max:20',
            'shop_food.name' => 'required|string|max:40',
        ];
    }
}
