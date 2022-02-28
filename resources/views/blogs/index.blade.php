<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホーム画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    
    
    <body>
        
    @extends('layouts.app')　　　　　　　　　　　　　　　　　　

    @section('content')
    {{Auth::user()->name}}
        <h1>ホーム</h1>
        <p class="shoplist">[<a href="/shops/">買い物リストを見る</a>]</p>
        <p class="limitlist">[<a href="/shops/{shop}/">期限リストを見る</a>]</p>


    @endsection
    
    </body>
</html>

