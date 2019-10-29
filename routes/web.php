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


Route::post('feedbacks', 'Admin\FeedbacksController@store')
    ->name('feedback.store');

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
], function () {
    Route::get('/', 'FeedbacksController@index')
        ->name('feedback.index')
        ->middleware('auth');
    Route::delete('feedbacks/{id}', 'FeedbacksController@destroy')
        ->name('feedback.destroy')
        ->where(['id' => '[0-9]+'])
        ->middleware('auth');
    Route::post('feedbacks/{id}', 'FeedbacksController@update')
        ->name('feedback.update')
        ->where(['id' => '[0-9]+'])
        ->middleware('auth');
    Route::get('feedbacks/{id}', 'FeedbacksController@show')
        ->name('feedback.show')
        ->where(['id' => '[0-9]+'])
        ->middleware('auth');
    Route::get('feedbacks/{id}/edit', 'FeedbacksController@edit')
        ->name('feedback.edit')
        ->where(['id' => '[0-9]+'])
        ->middleware('auth');
});

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/', 'HomeController@index')->name('home');
