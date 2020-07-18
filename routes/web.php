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

/**
 * ログイン状態のチェック
 */
Route::group(['middleware' => 'auth'], function() {

  // アカウント情報設定ページ
  Route::get('/setting/account', 'SettingController@showSettingForm')->name('setting.account');

  // 記事一覧ページ
  Route::get('/{user}/posts/', 'PostsController@showArchives')->name('posts.archive');
  Route::post('/{user}/posts/', 'PostsController@delete');

  // 記事作成画面
  Route::get('/posts/create', 'PostsController@showCreateForm')->name('posts.create');
  Route::post('/posts/create', 'PostsController@create');

  // 記事修正ページ
  Route::get('/posts/edit/{id}', 'PostsController@showEditForm')->name('posts.edit');
  Route::post('/posts/edit/{id}', 'PostsController@edit');


  // Route::post('/following', 'FollowController@follow');
});

Auth::routes();

//ユーザープロフィール
Route::get('{user}/profile/{user_id}', 'UserController@showProfile')->name('author.profile');

// 記事ページ
Route::get('/{id}', 'PostsController@showArticle')->name('posts.article');
