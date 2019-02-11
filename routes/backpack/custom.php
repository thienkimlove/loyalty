<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('post', 'PostCrudController');
    CRUD::resource('tag', 'TagCrudController');

    CRUD::resource('video', 'VideoCrudController');
    CRUD::resource('comment', 'CommentCrudController');
    CRUD::resource('contact', 'ContactCrudController');

    CRUD::resource('banner', 'BannerCrudController');
    CRUD::resource('member', 'MemberCrudController');

    Route::get('post/{id}/switch_is_blog', 'PostCrudController@switch_is_blog');
    Route::get('post/{id}/switch_is_home', 'PostCrudController@switch_is_home');
    Route::get('post/{id}/switch_is_top', 'PostCrudController@switch_is_top');

    CRUD::resource('video', 'VideoCrudController');
}); // this should be the absolute last line of this file