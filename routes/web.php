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

Auth::routes();
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'HomeController@index')->name('home');

Route::group(['middleware' => ['role:author']], function () {
});

Route::group(['middleware' => ['web']], function() {
    Route::get('threads', 'ThreadController@index')->name('threads.index');
    Route::get('threads/create', 'ThreadController@create')->name('threads.create');
    Route::get('threads/{thread}', 'ThreadController@show')->name('threads.show');
    Route::get('profile/{user}', 'HomeController@profile')->name('profile')->middleware('is_myself');

    Route::post('threads', 'ThreadController@store')->name('threads.store');
    Route::post('threads/{thread}/replies', 'ThreadController@reply')->name('threads.reply');

    Route::group(['middleware' => ['is_author']], function() {
        Route::put('threads/{thread}', 'ThreadController@update')->name('threads.update');
        Route::delete('threads/{thread}', 'ThreadController@remove')->name('threads.remove');
    });
});