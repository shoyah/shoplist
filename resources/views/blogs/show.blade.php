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
        
        <h1>作成した買い物リスト</h1>
    </body>
 
    
    <div class='shoplist'>
            <h2 class='title'>{{ $shop->name }}</h2>
    </div>
    @foreach($shop->shop_foods as $shop_food)    
    
    <div class = 'shop_food'>
    
        
            <h2 class='name'>{{ $shop_food->name }}</h2>
            <h2 class='cost'>{{ $shop_food->cost }}円</h2>
            <h2 class='shoumi_date'>{{ $shop_food->shoumi_date }}</h2>
            <h2 class='shouhi_date'>{{ $shop_food->shouhi_date }}</h2>
            
        
    </div>        

        <form action="/shops/{{ $shop_food->id }}" id="form_delete" method="POST">
        {{ csrf_field() }}
        {{ method_field('delete') }}
        <input type="submit" style="display:none">
        <p class="delete">[<span onclick="return deleteShop(this);">削除</span>]</p>
        </form>
        
        
        <p class="edit">[<a href="/shops/{{ $shop->id }}/shop_foods/{{ $shop_food->id }}/edit">編集</a>]</p>
        @endforeach
        
        <div class='back'>[<a href='/shops/'>買い物リスト一覧</a>]</div>
        <div class='add'>[<a href='/shops/{{ $shop->id }}/add'>商品を追加する</a>]</div>
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