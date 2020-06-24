<?php

namespace App\Http\Controllers;

use App\Posts;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function showProfile(string $user, int $user_id) {

        $user = User::find($user_id);
        $posts = $user->posts()->get();

        // var_dump($posts);
        return view('author.profile',[
            'user'  =>  $user,
            'posts' =>  $posts,
        ]);
    }
}
