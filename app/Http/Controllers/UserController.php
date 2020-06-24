<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile(int $user_id) {

        $user = User::find($user_id);
        $posts = $user->posts()->get();

        return view('author.profile',[
            'user'  =>  $user,
            'posts' =>  $posts,
        ]);
    }
}
