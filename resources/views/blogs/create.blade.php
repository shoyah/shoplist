<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>作成</title>
    </head>
    <body>
        
        <h1>買い物リストの作成</h1>

        <form action="/shops" method="POST">
        @csrf
        
            <div class="shops_name">
                <input type="text" name="shop[id]" placeholder="題名" value="{{ old('shop.id') }}"/>
                <p class="title__error" style="color:red">{{$errors->first("shop.id")}}</p>
            </div>
            
            <div class="foodname">
                <h5>商品名</h5>
                <input type="text" name="shop_food[name]" >
            </div>
            
            <div class="cost">
                <h5>金額</h5>
                <input type="text" name="shop_food[cost]" >
            </div>
            
            <div class="contents_shoumi">
                <h5>賞味期限</h5>
                <input type="date" name="shop_food[shoumi_date]" >
            </div>
            <div class="contents_shouhi">
                <h5>消費期限</h5>
                <input type="date" name="shop_food[shouhi_date]" >
            </div>

            <input type="submit" value="作成"/>
        </form>
        <div class="back">[<a href="/">back</a>]</div>
        

    </body>
</html>