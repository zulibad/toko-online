<?php

Route::get('/products', 'ProductController@index');

Route::get('/product/display', 'ProductController@showAll');

Route::get("/pintu-masuk", "TestController@pintuMasuk");

Route::group(["prefix" => "latihan"], function(){
    Route::get("/kategori/all", "CategoryController@index");
    Route::get("/kategori/search", "CategoryController@search");
    Route::get("/kategori/{id}/delete", "CategoryController@delete");
    Route::get("/kategori/{id}/restore", "CategoryController@restore");
    Route::get("/kategori/{id}/permanent-delete","CategoryController@permanentDelete");
    Route::view("layouts", "child");
});