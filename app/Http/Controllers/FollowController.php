<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Follow;

class FollowController extends Controller
{
    public function follow(Request $request) {
        $follow = new Follow;
        $follow->user_id = $request->user_id;
        $follow->following_id = $request->following_id;
        $follow->save();
    }
}
