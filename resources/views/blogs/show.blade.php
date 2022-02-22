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
    <form action="/shops/{{ $shop->id }}" id="form_delete" method="POST">
            {{ csrf_field() }}
            {{ method_field('delete') }}
            <input type="submit" style="display:none">
    </form>
    <div class='shoplist'>
            <h2 class='name'>{{ $shop_food->shop_id }}</h2>
            
            <p class='name'>{{ $shop_food->name }}</p>
            
            <p class='cost'>{{ $shop_food->cost }}</p>
            
            <p class='contents_shoumi'>{{ $shop_food->shoumi_date }}</p>
            
            <p class='contents_shouhi'>{{ $shop_food->shouhi_date }}</p>
            
            <p class='updated_at'>{{ $shop_food->updated_at }}</p>
            
        </div>
    
        <div class='back'>[<a href='/shops/'>決定</a>]</div>
        <p class="delete">[<span onclick="return deleteBlog(this);">削除</span>]</p>
        <p class="edit">[<a href="/shops/{{ $shop_food->id }}/edit">編集</a>]</p>
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