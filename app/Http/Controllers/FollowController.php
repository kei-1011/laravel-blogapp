<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Follow;
use App\Posts;
use App\User;
use Illuminate\Support\Facades\DB;

class FollowController extends Controller
{
    public function follow(Request $request) {
        $follow = new Follow;
        $follow->user_id = $request->user_id;
        $follow->following_id = $request->follow_id;
        $follow->save();
    }

    public function unfollow(Request $request) {

        DB::table('follows')
        ->where('user_id', $request->user_id)
        ->where('following_id', $request->follow_id)
        ->delete();

    }
}
