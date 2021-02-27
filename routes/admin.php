<?php

use Illuminate\Support\Facades\Route;





Route::get('lang/{lang}', function ($lang) {
    session()->has('lang')? session()->forget('lang') : ' ';
    $lang = in_array($lang, ['ar','en']) ?  session()->put('lang', $lang):session()->put('lang', '');
    return back();
});


Route::group(['prefix'=> '/','middleware' => 'auth:web'],function(){

    Route::get('/', 'Admin\LoginController@index');

    /*
    |--------------------------------------------------------------------------
    | Admin Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix'=> 'admin','namespace'=>'Admin','middleware' => 'guest:admin'],function(){

        Route::get('/','AdminController@index')->name('dashboard');

    /*
    |--------------------------------------------------------------------------
    | Users Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix'=> '/users',],function(){

        Route::get('/', 'UserController@index')->name('admins.users.index');
        Route::post('/', 'UserController@store')->name('admins.users.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('admins.users.edit');
        Route::post('/update/{id}', 'UserController@update')->name('admins.users.update');
        Route::post('/delete/{id}', 'UserController@destroy')->name('admins.users.destroy');

    });

    /*
    |--------------------------------------------------------------------------
    | appointments Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix'=> '/appointments',],function(){

        Route::get('/','AppointmentController@index')->name('appointments.index');
    });
    /*
    |--------------------------------------------------------------------------
    | Notifications Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix'=> '/notifications',],function(){

        Route::get('/','NotificationController@index')->name('notifications.index');
    });

    /*
    |--------------------------------------------------------------------------
    | Settings Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix'=> '/settings',],function(){

        Route::get('/','SettingController@index')->name('settings.index');
        Route::get('/invoices','InvoiceController@index')->name('settings.invoices.index');
        Route::get('/points','PointController@index')->name('settings.points.index');
        Route::get('/services','ServiceController@index')->name('settings.services.index');
    });

});

});






