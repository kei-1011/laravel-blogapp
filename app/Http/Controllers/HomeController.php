<?php

namespace App\Http\Controllers;

use App\Posts;
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
        $posts = Posts::all();

        return view('home', [
            'posts' =>  $posts,
        ]);
    }
}
