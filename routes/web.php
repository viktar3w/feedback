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


Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});

Auth::routes([
    'register' => false,
    'reset' => false,
]);

Route::get('/', 'HomeController@index')->name('home');

Route::post('feedbacks', 'Admin\FeedbacksController@store')
    ->name(\App\Services\FeedbackService::ACTION_CREATE);
Route::get('feedbacks', function () {
    abort(404);
});

Route::group(['prefix' => 'digging_deeper'], function () {
    Route::get('collections','DiggingDeeperController@collections')
        ->name('digging_deeper.collections');
});

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
], function () {
    Route::get('/', 'FeedbacksController@index')
        ->name('feedback.index')
        ->middleware('auth');
    Route::delete('feedbacks/{id}', 'FeedbacksController@destroy')
        ->name(\App\Services\FeedbackService::ACTION_DESTROY)
        ->where(['id' => '[0-9]+'])
        ->middleware('auth');
    Route::post('feedbacks/{id}', 'FeedbacksController@update')
        ->name(\App\Services\FeedbackService::ACTION_UPDATE)
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
