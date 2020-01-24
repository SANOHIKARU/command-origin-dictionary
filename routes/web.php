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

use App\Http\Controllers\CommandController;

Route::get('/', 'CategoryController@index')->name('category.index');
Route::get('category/create','CategoryController@create')->name('category.create');
Route::post('category/store', 'CategoryController@store')->name('category.store');
// {category}/edit
// {category}/delete

Route::get('{category_id}/index','CategoryController@show')->name('category.show');

// Route::get('command/{id}', 'CommandController@show')->name('command.show');
Route::get('{category_id}/command/create', 'CommandController@create')->name('command.create');
Route::post('command/store', 'CommandController@store')->name('command.store');
Route::get('command/{id}/edit', 'CommandController@edit')->name('command.edit');
// Route::get('command/{id}/delete', 'CommandController@delete')->name('command.delete');
Route::post('command/delete', 'CommandController@delete')->name('command.delete');


// {category}/{command}/delete


// http://{ホスト名}/admin/form に GET でアクセスすると、AdminBlogController の form メソッドを実行するという意味
// name メソッドでエイリアスをつけることができる
// Route::get('admin/form', 'AdminBlogController@form')->name('admin_form');