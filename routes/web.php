<?php

use Illuminate\Support\Facades\Route;


   
Route::get('/', 'BlogController@index');
Route::get('/shops/', 'BlogController@shoplist');
Route::get('/shops/create', 'BlogController@create');

Route::post('/shops', 'BlogController@store');
Route::get('/shops/{shop}', 'BlogController@show');



Route::post('/posts/{post}', 'BlogController@update');
Route::delete('/posts/{post}', 'BlogController@delete');
Route::get('/posts/{post}/edit', 'BlogController@edit');