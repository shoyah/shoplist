<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>買い物リスト</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>


        <h1>買い物リスト一覧</h1>
        <p class="create">[<a href="/shops/create">買い物リストを作成する</a>]</p>
        <div class='shops'>
            @foreach ($shops as $shop)
                <div class='shop'>
                    <h2 class='title'>
                    <a href="/shops/{{ $shop->id }}">{{ $shop->name }}</a>
                    </h2>
                    <p class='foods'>{{ $shop->name }}</p>
                    <p class='money'>{{ $shop->contents_money }}</p>
                    <p class='shoumi'>{{ $shop->shoumi_date }}</p>
                    <p class='shouhi'>{{ $shop->shouhi_date }}</p>
                </div>
                <form action="/shops/{{ $shop->id }}" id="form_{{ $shop->id }}" method="shop" style="display:inline">
            @csrf
            @method('DELETE')
        <button type="submit">delete</button> 
        </form>
            @endforeach
            <div class='back'>[<a href='/shops/'>戻る</a>]</div>
    </body>
</html>