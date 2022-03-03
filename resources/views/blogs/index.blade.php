<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>ホーム画面</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    
    <script type="text/javascript">
    <!--

    // 設定開始
    // （フレームの場合は、表示先のフレーム名を設定してください）
    // （top を指定すると、フレームの分割を廃止して画面全体で表示します）
    // （blank を指定すると、新規ウィンドウで表示します）
    
    var target = "";
    
    // 設定終了
    
    
    function jump(){
    
    	var url = document.form1.select.options[document.form1.select.selectedIndex].value;
    
    	if(url != "" ){
    
    		if(target == 'top'){
    
    			top.location.href = url;
    
    		}
    		else if(target == 'blank'){
    
    			window.open(url, 'window_name');
    
    		}
    		else if(target != ""){
    
    			eval('parent.' + target + '.location.href = url');
    
    		}
    		else{
    
    			location.href = url;
    
    		}
    
    	}
    
    }
    
    // -->
</script>
    </head>
    
    
    <body>
        
    @extends('layouts.app')　　　　　　　　　　　　　　　　　　

    @section('content')
    {{Auth::user()->name}}
    
    
        <h1>ホーム</h1>
        <p class="shoplist">[<a href="/shops/">買い物リストを見る</a>]</p>
        
        <form action="#" name="form1">
            <select name="select" onChange="jump()">
            <option value="">期限リストを見る</option>
            <option value="/limits/shoumi">賞味期限順</option>
            <option value="/limits/shouhi">消費期限順</option>
            </select>
        </form>
        

    @endsection
    
    </body>
</html>

