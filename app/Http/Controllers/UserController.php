<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function showProfile(string $user) {

        $user = User::where('name',$user)->first();
        $posts = Posts::orderBy('created_at', 'desc')->where('user_id',$user->id)->paginate(10);

        return view('author.profile',[
            'user'  =>  $user,
            'posts' =>  $posts,
        ]);
    }

    public function showLikeList(string $user_name) {
        $user = User::where('name',$user_name)->first();
        $likes = Like::orderBy('created_at', 'DESC')->where('user_id',$user->id)->get();

        $empty = 'いいねしている記事はまだありません。';

            foreach($likes as $like) {
                $posts[] = Posts::find($like->post_id);
            }
        if(!empty($posts)) {

            return view('author.likes',[
                'user'  =>  $user,
                'posts' =>  $posts,
            ]);
        } else {

            return view('author.likes',[
                'user'  =>  $user,
                'empty' =>  $empty,
            ]);
        }


    }
}
