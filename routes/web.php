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


// ホーム画面はログインなしでも閲覧可能
Route::get('/', 'HomeController@index')->name('home');
Route::get('{id}/post/{user_id}', 'PostsController@showArticle')->name('posts.article');

/**
 * ログイン状態のチェック
 */
Route::group(['middleware' => 'auth'], function() {
  Route::get('post/create', 'PostsController@showCreateForm')->name('posts.create');
  Route::post('post/create', 'PostsController@create');
});

Auth::routes();
