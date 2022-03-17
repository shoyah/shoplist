<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Update</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>作成した買い物リスト</h1>
    </body>
    
        @extends('layouts.app')　　　　　　　　　　　　　　　　　　

        @section('content')
 
    <div class='shoplist'>
        <h2 class='title'>{{ $shop->name }}</h2>
    </div>
    <div class = 'shop_food'>
        @foreach($shop->shop_foods as $shop_food)
            <h2 class='name'>{{ $shop_food->name }}</h2>
            <h2 class='cost'>{{ $shop_food->cost }}</h2>
            <h2 class='shoumi_date'>{{ $shop_food->shoumi_date }}</h2>
            <h2 class='shouhi_date'>{{ $shop_food->shouhi_date }}</h2>
        @endforeach
    </div>        
    <div class='back'>[<a href='/shops/'>決定</a>]</div>
    <p class="delete">[<span onclick="return deleteBlog(this);">削除</span>]</p>
    <p class="edit">[<a href="/shops/{{ $shop->id }}/edit">編集</a>]</p>
    <script>
    function deletePost(e) {
        "use strict";
        if (confirm("削除すると復元できません。\n本当に削除しますか？")){
            document.getElementById("form_delete").submit();
        }
    }
    </script>

    @endsection

    </body>
</html>