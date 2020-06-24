<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function showArticle(string $user,int $id)
    {
        // getパラメータのidを元に記事データを取得、テンプレートに渡す
        $post = Posts::find($id);

        return view('posts.article', [
            'post' =>  $post
        ]);
    }

    public function showCreateForm() {
        return view('posts.create');
    }

    public function showEditForm(int $user, int $id) {
        $post = Posts::find($id);

        return view('posts.edit', [
            'post' =>  $post
        ]);
    }

    // ユーザーが書いた記事一覧
    public function showArchives() {
        $posts = Auth::user()->posts()->get();

        return view('posts.archive', [
            'posts' =>  $posts,
        ]);
    }

    public function create(Request $request) {

        $posts = new Posts();

        $posts->user_id = Auth::id();
        $posts->body = $request->body;
        $posts->title = $request->title;
        $posts->created_at = Carbon::now();
        $posts->updated_at = Carbon::now();

        $posts->save();

        return redirect()->route('home');
    }
}
