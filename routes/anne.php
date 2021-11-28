<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix'=>'Anne','namespace' => 'Anne'],function () {
    route::get('index','anneController@index')->name('anne.index');
    Route::post('active/{id_anne}','anneController@active')->name('anne.active');
    route::get('get-All-Anne','anneController@getAnne')->name('get.all.anne');
    route::get('get-anne-active','anneController@anneActive')->name('get.anne.active');
    route::get('insertData','anneController@insertion')->name('anne.insert');
});

