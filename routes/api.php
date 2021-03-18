<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::group(['namespace'=>'Api', 'middleware' => ['api','checkPassword']],function(){

    Route::group(['prefix' =>'admin'],function(){

        Route::post('login', 'AuthController@login');
    });

});


Route::group(['namespace'=>'Api', 'middleware' => ['api','checkPassword','checkAdminToken:admin-api']],function(){

    Route::post('users', 'UserController@index')->name('api.users.index');
});
