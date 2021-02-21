<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('lang/{lang}', function ($lang) {
    session()->has('lang')? session()->forget('lang') : ' ';
    $lang = in_array($lang, ['ar','en']) ?  session()->put('lang', $lang):session()->put('lang', '');
    return back();
});


Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');




