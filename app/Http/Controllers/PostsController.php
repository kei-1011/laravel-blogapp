<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function showArticle(int $id)
    {
        // getパラメータのidを元に記事データを取得、テンプレートに渡す
        $post = Posts::find($id);

        return view('posts.article', [
            'post' =>  $post,
        ]);
    }
}
