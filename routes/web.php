<?php

use Illuminate\Support\Facades\Route;



Route::group(['middleware' => ['auth']], function(){
    Route::get('/', 'BlogController@index');
    Route::get('/shops/', 'BlogController@shoplist');
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
