<?php

use Illuminate\Support\Facades\Route;


Route::group(['prefix'=>'Classe','namespace' => 'Classe'],function () {
     route::get('index','classeController@index')->name('classe.index');
    route::get('get-all-classe','classeController@getAllClasse')->name('get.all.classe');
    Route::post('get-classe-byId','classeController@getClasseById')->name('get.classe.byId');
    Route::post('modifier-classe-capaciter','classeController@editClasseCapaciter')->name('classe.modifierCapaciter');
    Route::post('get-class-prix-byId','classeController@getPrixById')->name('get.prix.byId');
    Route::post('modifier-classe-prix','classeController@editClassePrix')->name('classe.modifierPrix');
    Route::post('change-status-classe','classeController@changeStatus')->name('change.status.classe');
});


