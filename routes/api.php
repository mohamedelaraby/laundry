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
    Route::group(['prefix' => 'users'],function(){
        Route::post('/', 'UserController@index');
        Route::post('create', 'UserController@store');
        Route::post('/show/{id}', 'UserController@show');
        Route::post('/update/{id}', 'UserController@update');
        Route::post('/delete/{id}', 'UserController@destroy');
    });

    // Services
    Route::group(['prefix'=> 'services'],function(){
        Route::post('/', 'ServiceController@index');
    });

    // Services types
    Route::group(['prefix'=> 'servicesTypes'],function(){
        Route::post('/', 'ServiceTypeController@index');
    });
    
    // Appointments
    Route::group(['prefix'=> 'appointments'],function(){
        Route::post('/', 'AppointmentController@index');
    });
    
    // Notifications
    Route::group(['prefix'=> 'notifications'],function(){
        Route::post('/', 'NotificationController@index');
    });
     
    // Cars
    Route::group(['prefix'=> 'cars'],function(){
        Route::post('/', 'CarController@index');
    });

});

