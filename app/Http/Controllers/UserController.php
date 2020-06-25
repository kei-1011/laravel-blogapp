<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile(string $user) {

        $user = User::where('name',$user)->first();
        $posts = $user->posts()->get();

        return view('author.profile',[
            'user'  =>  $user,
            'posts' =>  $posts,
        ]);
    }
}
