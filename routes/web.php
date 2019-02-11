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
Route::post('saveContact', 'FrontendController@saveContact')->name('frontend.saveContact');
Route::post('saveComment', 'FrontendController@saveComment')->name('frontend.saveComment');
Route::get('tim-kiem', 'FrontendController@search')->name('frontend.search');
Route::get('dang-bai-viet', 'FrontendController@write')->name('frontend.write');
Route::post('/saveRegister', 'FrontendController@saveRegister')->name('frontend.saveRegister');
Route::get('tu-khoa/{value}', 'FrontendController@tag')->name('frontend.tag');

Route::get('lien-he', 'FrontendController@contact')->name('frontend.contact');
Route::get('dieu-khoan', 'FrontendController@policy')->name('frontend.policy');
Route::get('video/{value?}', 'FrontendController@video')->name('frontend.video');

# Sitemap
Route::get('sitemap_index.xml', 'FrontendController@sitemap');
Route::get('sitemap_posts.xml', 'FrontendController@sitemap_posts');
Route::get('sitemap_categories.xml', 'FrontendController@sitemap_categories');
Route::get('sitemap_videos.xml', 'FrontendController@sitemap_videos');
Route::get('test_ios', 'FrontendController@test');
Route::get('{value}', 'FrontendController@main')->name('frontend.main');



