<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
    </head>
        <body>

        <h1 class="title">編集</h1>
        <div class="content">
            <form action="/blogs/{{ $blog->id }}" method="BLOG">
                @csrf
                @method('PUT')
                <div class="shops_name">
            <input type="text" name="shop[name]" placeholder="題名" value="{{ old('shop.name') }}"/>
            <p class="title__error" style="color:red">{{$errors->first("shop.name")}}</p>
        </div>
        <div class="contents_food">
            <h5>商品名</h5>
            <input type="text" name="blog[contents_food]" >
        </div>
        <div class="contents_money">
            <h5>金額</h5>
            <input type="text" name="blog[contents_money]" >
        </div>
        <div class="contents_shoumi">
            <h5>賞味期限</h5>
            <input type="date" name="blog[contents_shoumi]" >
        </div>
        <div class="contents_shouhi">
            <h5>消費期限</h5>
            <input type="date" name="blog[contents_shouhi]" >
        </div>
        </form>
        <input type="submit" value="作成"/>
            </form>
        </div>

    </body>
</html>