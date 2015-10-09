<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group([
    'prefix' => 'reporter',
], function () {
    Route::get('/', function () {
        return 'hello';
    });

    Route::get('register', function () {
        return 'registration';
    });
});

Route::group([
    'prefix' => 'admin',
], function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    Route::match(
        ['get', 'post'],
        'invite/email',
        'Admin\InviteController@email'
    );
});
