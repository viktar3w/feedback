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


Route::get('/', 'HomeController@index')->name('home');
Route::post('feedbacks', 'Admin\FeedbacksController@store')->name('feedbacks.store');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false,
]);

Route::group([
    'prefix' => 'admin',
    'namespace' => 'Admin',
], function () {
    Route::get('/', 'FeedbacksController@index')->name('feedbacks.index')->middleware('auth');
    Route::delete('feedbacks/{id}', 'FeedbacksController@destroy')->name('feedbacks.destroy')->where(['id'=>'[0-9]+'])->middleware('auth');
    Route::post('feedbacks/{id}', 'FeedbacksController@update')->name('feedbacks.update')->where(['id'=>'[0-9]+'])->middleware('auth');
    Route::get('feedbacks/{id}', 'FeedbacksController@edit')->name('feedbacks.edit')->where(['id'=>'[0-9]+'])->middleware('auth');
});
