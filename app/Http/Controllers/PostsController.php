<?php

namespace App\Http\Controllers;

use App\Posts;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function showArticle(int $id,int $user_id)
    {
        // getパラメータのidを元に記事データを取得、テンプレートに渡す
        $post = Posts::find($id);
        $user = User::find($user_id);

        return view('posts.article', [
            'post' =>  $post,
            'user'  =>  $user,
        ]);
    }

    public function showCreateForm() {
        return view('posts.create');
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
