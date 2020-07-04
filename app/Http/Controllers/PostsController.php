<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\EditPost;
use App\Http\Requests\CreatePost;
use Illuminate\Support\Facades\Auth;
// use Laravel\Ui\Presets\React;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    public function showArticle(string $user,int $id)
    {
        // getパラメータのidを元に記事データを取得、テンプレートに渡す
        $post = Posts::find($id);

        return view('posts.article', [
            'post' =>  $post,
        ]);
    }

    public function showCreateForm(string $user,int $user_id) {
        return view('posts.create');
    }

    public function showEditForm(string $user,int $id,int $user_id) {
        $post = Posts::find($id);

        return view('posts.edit', [
            'post' =>  $post,
        ]);
    }

    // ユーザーが書いた記事一覧
    public function showArchives(string $user,int $user_id) {
        $posts = Auth::user()->posts()->get();

        $user = User::where('name',$user)->first();

        return view('posts.archive', [
            'posts' =>  $posts
        ]);
    }

    public function create(string $user,int $user_id,CreatePost $request) {

        $posts = new Posts();

        $posts->user_id = $user_id;
        $posts->body = $request->body;
        $posts->title = $request->title;
        $posts->created_at = Carbon::now();
        $posts->updated_at = Carbon::now();

        $posts->save();

        return redirect()->route('home');
    }

    public function edit(string $user,int $user_id,int $id, EditPost $request) {
    $post = Posts::find($id);

    $post->title = $request->title;
    $post->body = $request->body;
    $post->save();

    return redirect()->route('posts.archive',[
        'user' => Auth::user()->name,
        'user_id'   =>  Auth::id(),
        ]);
    }

    // 記事データを削除、テンプレートファイルをajaxに返す
    public function delete(string $user,int $user_id, Request $request) {
        foreach($request->delete_post as $post_id) {
            DB::table('posts')->where('id', $post_id)->delete();
        }

        $posts = Auth::user()->posts()->get();

        $user = User::where('name',$user)->first();

        return view('posts.archive', [
            'posts' =>  $posts
        ]);
    }

}
