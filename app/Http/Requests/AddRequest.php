<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRequest extends FormRequest
{
    public function rules()
    {
        return [
            'shop_food.name' => 'required|string|max:40',            
        ];
    }
}
