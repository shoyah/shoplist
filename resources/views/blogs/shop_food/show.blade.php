<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Show</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        
        <h1>作成した買い物リスト</h1>
    </body>
 
    <div class='shoplist'>
            <h2 class='title'>{{ $shop->shop_id->name }}</h2>
    </div>
    <div class = 'shop_food'>
 
            <h2 class='name'>{{ $shop->name }}</h2>
            <h2 class='cost'>{{ $shop->cost }}</h2>
            <h2 class='shoumi_date'>{{ $shop->shoumi_date }}</h2>
            <h2 class='shouhi_date'>{{ $shop->shouhi_date }}</h2>
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

    </body>
</html>