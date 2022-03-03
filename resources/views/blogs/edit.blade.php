<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>edit</title>
    </head>
        <body>
            
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　

        @section('content')

        <h1 class="title">編集画面</h1>
        <div class="content">
            <form action="/shops/{{ $shop->id }}/shop_foods/{{ $shop_food->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="shops_name">
            <input type='text' name='shop[name]' value="{{ $shop_food->shop->name }}">
            </div>
            
            
            <div style="display:inline-flex">
            
            <div class="foodname">
                <h5>商品名</h5>
                <input type="text" name="shop_food[name]" value="{{ $shop_food->name }}">
            </div>
            
            <div class="cost">
                <h5>金額</h5>
            <input type="text" name="shop_food[cost]" value="{{ $shop_food->cost }}">円
            </div>
            
            <div class="contents_shoumi">
                <h5>賞味期限</h5>
            <input type="date" name="shop_food[shoumi_date]" value="{{ $shop_food->shoumi_date }}">
            </div>
            
            <div class="contents_shouhi">
                <h5>消費期限</h5>
            <input type="date" name="shop_food[shouhi_date]" value="{{ $shop_food->shouhi_date }}">
            </div>
            </div>
            <div class="submit">
        <input type="submit" value="保存"/>
        </div>
        
            </form>
        </div>
        
        @endsection
    </body>
</html>