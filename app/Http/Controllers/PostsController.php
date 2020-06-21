<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function showArticle(int $id,int $user_id)
    {
        // getパラメータのidを元に記事データを取得、テンプレートに渡す
        $post = Posts::find($id);
        $user = Users::find($user_id);

        return view('posts.article', [
            'post' =>  $post,
            'user'  =>  $user,
        ]);
    }
}
