<?php

use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'BlogController@index');
    Route::get('/shops/', 'BlogController@shoplist');
    
    Route::get('/limits/', 'LimitlistController@index');
    Route::get('/limits/shoumi', 'LimitlistController@shoumi');
    Route::get('/limits/shouhi', 'LimitlistController@shouhi');
    
    Route::get('/shops/create', 'BlogController@create');
    Route::post('/shops', 'BlogController@store');
    Route::get('/shops/{shop}', 'BlogController@show');
    Route::get('/shops/{shop}/add', 'BlogController@add');
    Route::post('/shops/{shop}/shops', 'BlogController@aditional');
    Route::get('/shops/{shop}/shop_foods/{shop_food}/edit', 'BlogController@edit');
    Route::put('/shops/{shop}/shop_foods/{shop_food}', 'BlogController@update');
    Route::delete('/shops/{shop}', 'BlogController@delete');


    
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Route::get('/linelogin', 'LineLoginController@lineLogin')->name('linelogin');
//Route::get('/callback', 'LineLoginController@callback')->name('callback');

// LINE メッセージ受信
Route::post('/line/webhook', 'LineMessengerController@webhook')->name('line.webhook');
 
// LINE メッセージ送信用
Route::get('/line/message', 'LineMessengerController@message');