<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;
use Auth;
use App\Post;

class LikesController extends Controller
{
    public function store(Request $request) {
        $like = new Like;
        $like->post_id = $request->post_id;
        $like->user_id = $request->user_id;
        $like->save();

        // いいねの数
        $res['count'] = Like::where('post_id',$request->post_id)->count();

        // like_id
        $res['like_id'] = Like::where('post_id',$request->post_id)->where('user_id', $request->user_id)->get()[0]->id;
        return $res;
    }

    // いいね削除
    public function destroy(Request $request) {
        $like = Like::find($request->like_id);
        $like->delete();

        $res = Like::where('post_id',$request->post_id)->count();
        return $res;
    }
}
