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
Route::get('/{user}/items/{id}', 'PostsController@showArticle')->name('posts.article');

/**
 * ログイン状態のチェック
 */
Route::group(['middleware' => 'auth'], function() {
  // 記事作成
  Route::get('post/create', 'PostsController@showCreateForm')->name('posts.create');
  Route::post('post/create', 'PostsController@create');

  //
  Route::get('{user}/items', 'PostsController@showArchives')->name('posts.archive');

  Route::get('/{user}/items/{id}/edit', 'PostsController@showEditForm')->name('posts.edit');
  Route::post('/{user}/items/{id}/edit', 'PostsController@edit');
});

Auth::routes();
