<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>買い物リスト</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>

        @extends('layouts.app')　　　　　　　　　　　　　　　　　　

        @section('content')
        
        <!--作成した買い物リストの一覧表示画面-->
        
        <h1>買い物リスト一覧</h1>
        <p class="create">[<a href="/shops/create">買い物リストを作成する</a>]</p>
        
        <div class='shops'>
        @csrf
            @foreach ($shop as $shop)
                <small>{{ $shop->user->name }}</small>
                <div class='shop'>
                    <h2 class='title'>
                    <a href="/shops/{{ $shop->id }}">{{ $shop->name }}</a>
                    </h2>
            @endforeach        
        </div>
        <div class='back'>[<a href='/'>戻る</a>]</div>
        @endsection
    </body>
</html>