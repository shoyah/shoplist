<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>追加</title>
    </head>
    <body>
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　

        @section('content')
        
        <h1>商品の追加</h1>

        <form action="/shops/{{ $shop->id }}/shops" method="post">
        @csrf
        
            <div class='shoplist'>
                <h2 class='title'>{{ $shop->name }}</h2>
            </div>
        
            
            <div style="display:inline-flex">
            
        
            <div class="foodname">
                <h5>商品名</h5>
                <input type="text" name="shop_food[name]" >
            </div>
                  
            <div class="cost">
                <h5>金額</h5>
                <input type="text" name="shop_food[cost]" >円
            </div>
                    
            <div class="contents_shoumi">
                <h5>賞味期限</h5>
                <input type="date" name="shop_food[shoumi_date]" >
            </div>
            
            <div class="contents_shouhi">
                <h5>消費期限</h5>
                <input type="date" name="shop_food[shouhi_date]" >
            </div>
            
            </div>
                <div class="submit">
                    <input type="submit" value="作成"/>
                </div>
        </form>
            <div class="back">[<a href="/">back</a>]</div>
        
        @endsection
    </body>
</html>