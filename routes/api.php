<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

// Route::group(['namespace'=>'Api', 'middleware' => ['api','checkPassword']],function(){
//     Route::post('services', 'TestController@index');
// });

Route::group(['namespace'=>'Api', 'middleware' => ['api','checkPassword']],function(){

    Route::group(['prefix' =>'admin'],function(){

        Route::post('login', 'AuthController@login');
    });

});

Route::group(['namespace'=>'Api', 'middleware' => ['api','checkPassword','checkUserToken:user-api']],function(){

    // Users
    // Route::apiResource('users', 'UserController');
    Route::post('users', 'UserController@index');
    
    // Services
    Route::group(['prefix'=> 'services'],function(){
        Route::post('/', 'ServiceController@index');

    });

});

