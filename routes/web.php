<?php

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

Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('logout', 'FrontendController@logout')->name('frontend.logout');
Route::post('add_card', 'FrontendController@addCard')->name('frontend.add_card');
Route::post('login', 'FrontendController@login')->name('frontend.login');



