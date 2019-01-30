<?php

Route::group(['prefix' => 'auth'], function () {
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@index');
});

Route::group(['prefix' => 'user'], function () {
    Route::get('info', 'UserController@index');
    Route::post('setting', 'UserController@setting');
});


Route::group(['prefix' => 'post'], function () {
    Route::get('index', 'PostController@index');
    Route::get('show/{post}', 'PostController@show');
    Route::post('store', 'PostController@store');
});

Route::group(['prefix' => 'comment'], function () {
    Route::post('store', 'CommentController@store');
    Route::get('list/{id}', 'CommentController@list');
});

Route::group(['prefix' => 'reply'], function () {
    Route::post('store', 'ReplyController@store');
});

Route::group(['prefix' => 'like'], function () {
    Route::post('inpost/{post}', 'LikeController@inpost');
    Route::post('outpost/{post}', 'LikeController@outpost');
});
