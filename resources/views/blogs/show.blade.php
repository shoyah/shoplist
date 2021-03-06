<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Show</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　

        @section('content')
        
        <!--作成した買い物リストの表示画面-->
        
        <h1>作成した買い物リスト</h1>
    </body>
    
    <div class='shoplist'>
        <h2 class='title'>{{ $shop->name }}</h2>
    </div>
    
    <small>{{ $shop->user->name }}</small>
    
    <div class="d-flex justify-content-around">
        <u><h5>商品名</h5></u>
        <u><h5>金額</h5></u>
        <u><h5>賞味期限</h5></u>
        <u><h5>消費期限</h5></u>
    </div>
    @foreach($shop->shop_foods as $shop_food)    
        <div class = 'shop_food'>
            <div class="form-row">
                <form action="/shops/{{ $shop->id }}" id="form_delete" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('delete') }}
                    <input type="submit" style="display:none">
                    <p class="delete">[<span onclick="return deleteShop(this);">削除</span>]</p>
                </form>
                <p class="edit">[<a href="/shops/{{ $shop->id }}/shop_foods/{{ $shop_food->id }}/edit">編集</a>]</p>
                <div class="col">
                    <h4 class='text-center'>{{ $shop_food->name }}</h4>
                </div>
                <div class="col">
                    <h4 class='text-center'>{{ $shop_food->cost }}円</h4>
                </div>
                <div class="col">
                    <h4 class='text-center'>{{ $shop_food->shoumi_date }}</h4>
                </div>
                <div class="col">
                    <h4 class='text-center'>{{ $shop_food->shouhi_date }}</h4>
                </div>
            </div>
        </div>        
    @endforeach
    
    <h4 class='sum'>合計 {{ $sum }}円</h4>
    <div class='add'>[<a href='/shops/{{ $shop->id }}/add'>商品を追加する</a>]</div>
    <div class='back'>[<a href='/shops/'>買い物リスト一覧</a>]</div>
    <script>
        function deleteShop(e) {
            "use strict";
            if (confirm("削除すると復元できません。\n本当に削除しますか？")){
                document.getElementById("form_delete").submit();
            }
        }
    </script>
    @endsection
    </body>
</html>