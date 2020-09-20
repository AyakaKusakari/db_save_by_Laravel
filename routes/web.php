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

Route::get('/', function () {
    return view('welcome');
});

// お問い合わせ入力ページ
Route::get('/', 'InquiriesController@index')->name('inquiry');

// DB挿入
Route::post('/process', 'InquiriesController@process')->name('process');

// 完了ページ
Route::get('/complete', 'InquiriesController@complete')->name('complete');

// お問い合わせ一覧ページ
Route::get('/dashboard', 'DashboardsController@index')->name('dashboard');