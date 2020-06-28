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


// ログインなしでも閲覧可能
// 記事一覧
Route::get('/', 'HomeController@index')->name('home');

//ユーザープロフィール
Route::get('{user}/{user_id}', 'UserController@showProfile')->name('author.profile');

// 記事ページ
Route::get('/{user}/{id}', 'PostsController@showArticle')->name('posts.article');

/**
 * ログイン状態のチェック
 */
Route::group(['middleware' => 'auth'], function() {
  // 記事一覧ページ
  Route::get('{user}/{user_id}/posts/', 'PostsController@showArchives')->name('posts.archive');

  // 記事作成画面
  Route::get('/{user}/{user_id}/posts/create', 'PostsController@showCreateForm')->name('posts.create');
  Route::post('/{user}/{user_id}/posts/create', 'PostsController@create');

  // 記事修正ページ
  Route::get('/{user}/{user_id}/posts/edit/{id}', 'PostsController@showEditForm')->name('posts.edit');
  Route::post('/{user}/{user_id}/posts/edit/{id}', 'PostsController@edit');
});

Auth::routes();
