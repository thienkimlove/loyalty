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
    CRUD::resource('member', 'MemberCrudController');
    CRUD::resource('gift', 'GiftCrudController');
    CRUD::resource('product', 'ProductCrudController');
    CRUD::resource('transaction', 'TransactionCrudController');
    CRUD::resource('add_card', 'AddCardCrudController');
    CRUD::resource('card', 'CardCrudController')->with(function(){
        // add extra routes to this resource
        Route::post('card/export', 'CardCrudController@export');
    });

}); // this should be the absolute last line of this file