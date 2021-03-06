<?php

namespace App\Http\Controllers;

use App\Posts;
use App\Users;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        /**
         *  ミドルウェアでログイン権限のチェック
         *  ログインしていなかったら、return redirect()->guest('login');でログイン画面に飛ばされる
         * */

    //         $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // modelクラスのallメソッドで全ての記事を取得
        $posts = Posts::orderBy('created_at', 'desc')->paginate(10);

        // テンプレートに全ての記事データを渡す
        return view('home', [
            'posts' =>  $posts,
        ]);
    }
}
