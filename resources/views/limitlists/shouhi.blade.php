<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>期限リスト</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>

        @extends('layouts.app')　　　　　　　　　　　　　　　　　　

        @section('content')
        
        <h1>消費期限リスト一覧</h1>
        
        <div class="d-flex justify-content-around">
            <u><h5>商品名</h5></u>
            <u><h5>消費期限</h5></u>
        </div>
        
        <div class='list'>
            @csrf
            @foreach($shops as $shop)
            <div class='shop'>
                <div class="d-flex justify-content-around">
                    <h4 class='name'>{{ $shop->name }}</h4>
                    <h4 class='shouhi_date'>{{ $shop->shouhi_date }}</h4>
                </div>    
            </div>
        </div>
            
        @endforeach    
    <div class='back'>[<a href='/'>戻る</a>]</div>
    
    @endsection
   
    </body>
</html>