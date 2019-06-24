<?php

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group([
    'prefix' => 'questions'
], function () {

    Route::get('/', [
        'uses' => 'Questions@index',
        'as' => 'all'
    ]);

});

Route::group([
    'prefix' => 'categories'
], function () {

    Route::get('/', [
        'uses' => 'CategoriesController@index',
        'as' => 'all'
    ]);

    Route::get('/{id}', [
        'uses' => 'CategoriesController@show',
        'as' => 'single'
    ]);

});