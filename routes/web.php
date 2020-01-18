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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'CategoryController@index')->name('category.index');
Route::get('category/create','CategoryController@create')->name('category.create');


// http://{ホスト名}/admin/form に GET でアクセスすると、AdminBlogController の form メソッドを実行するという意味
// name メソッドでエイリアスをつけることができる
// Route::get('admin/form', 'AdminBlogController@form')->name('admin_form');