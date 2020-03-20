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

Route::group(['prefix' => '/', 'namespace' => 'Front', 'as' => 'front'], function() {
    Route::get('/', 'FrontController@index');

    Route::get('podcasts', 'FrontController@podcasts');

    Route::get('events', 'FrontController@events');

    Route::get('support', 'FrontController@support');

    Route::get('contact', 'FrontController@contact');

    Route::get('blog', 'BlogController@index');
});

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.', 'middleware' => 'auth'], function() {
    Route::get('/', 'AdminController@index');

    Route::resources([
        'podcasts' => 'PodcastsController'
    ]);
});
