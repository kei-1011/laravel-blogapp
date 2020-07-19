<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile(string $user,int $user_id) {

        $user = User::where('name',$user)->first();
        $posts = Posts::where('user_id',$user_id)->get();

        return view('author.profile',[
            'user'  =>  $user,
            'posts' =>  $posts,
        ]);
    }
}
