<?php

use Illuminate\Support\Facades\Route;


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
        Route::get('/create', 'UserController@create')->name('admins.users.create');
        Route::post('/store', 'UserController@store')->name('admins.users.store');
        Route::get('/edit/{id}', 'UserController@edit')->name('admins.users.edit');
        Route::post('/update/{id}', 'UserController@update')->name('admins.users.update');
        Route::post('/delete/{id}', 'UserController@destroy')->name('admins.users.destroy');

    });

    /*
    |--------------------------------------------------------------------------
    | Services Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix'=> '/services',],function(){

        Route::get('/', 'ServiceController@index')->name('admins.services.index');
        Route::get('/create', 'ServiceController@create')->name('admins.services.create');
        Route::post('/create', 'ServiceController@create')->name('admins.services.store');
        Route::get('/edit/{id}', 'ServiceController@edit')->name('admins.services.edit');
        Route::post('/update/{id}', 'ServiceController@update')->name('admins.services.update');
        Route::post('/delete/{id}', 'ServiceController@destroy')->name('admins.services.destroy');

    });

    /*
    |--------------------------------------------------------------------------
    | appointments Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix'=> '/appointments',],function(){

        Route::get('/', 'AppointmentController@index')->name('admins.appointments.index');
        Route::get('/previousappointments', 'AppointmentController@previousAppointments')->name('admins.appointments-previous.index');
        Route::get('/create', 'AppointmentController@create')->name('admins.appointments.create');
        Route::get('/edit/{id}', 'AppointmentController@edit')->name('admins.appointments.edit');
        Route::post('/create', 'AppointmentController@create')->name('admins.appointments.store');
        Route::post('/update/{id}', 'AppointmentController@update')->name('admins.appointments.update');
        Route::post('/delete/{id}', 'AppointmentController@destroy')->name('admins.appointments.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | invoices Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix'=> '/invoices',],function(){

        Route::get('/', 'InvoiceController@index')->name('admins.invoices.index');
        Route::get('/create', 'InvoiceController@create')->name('admins.invoices.create');
        Route::get('/edit/{id}', 'InvoiceController@edit')->name('admins.invoices.edit');
        Route::post('/create', 'InvoiceController@create')->name('admins.invoices.store');
        Route::post('/update/{id}', 'InvoiceController@update')->name('admins.invoices.update');
        Route::post('/delete/{id}', 'InvoiceController@destroy')->name('admins.appointments.destroy');
    });

    /*
    |--------------------------------------------------------------------------
    | reports Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix'=> '/reports',],function(){

        Route::get('/users', 'ReportController@users')->name('admins.reports.users');
        Route::get('/invoices', 'ReportController@invoices')->name('admins.reports.invoices');
        Route::get('/appointments', 'ReportController@appointments')->name('admins.reports.appointments');
        Route::get('/services', 'ReportController@services')->name('admins.reports.services');
    });
    /*
    |--------------------------------------------------------------------------
    | Notifications Routes
    |--------------------------------------------------------------------------
    */
    Route::group(['prefix'=> '/notifications',],function(){

        Route::get('/','NotificationController@index')->name('admins.notifications');
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






