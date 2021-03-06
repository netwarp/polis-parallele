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

    Route::get('podcasts/{slug}', 'FrontController@podcast');

    Route::get('events', 'FrontController@events');

    Route::get('support', 'FrontController@support');

    Route::get('contact', 'FrontController@contact');

    Route::get('blog', 'BlogController@index');

    Route::get('blog/{slug}', 'BlogController@post');
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
        'posts' => 'PostsController',
        'podcasts' => 'PodcastsController',
        'events' => 'EventsController'
    ]);

    Route::get('support', 'SupportController@index');
    Route::post('support', 'SupportController@post');

    Route::get('contact', 'ContactController@index');
    Route::post('contact', 'ContactController@post');
});

Route::get('resource/{resource}/{id}/{file}', function($resource, $id, $file) {
    $path = storage_path("app/{$resource}/{$id}/{$file}");
    if (! File::exists($path)) {
        return;
    }

    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header('Content-Type', $type);
    return $response;
});
