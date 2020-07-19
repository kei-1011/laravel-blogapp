<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;

class Posts extends Model
{
  public function user() {
      return $this->belongsTo('App\User');
  }

  public function likes() {
    return $this->hasMany('App\Like');
  }

  Public function likedBy($user) {
    return Like::where('user_id', $user->id)->where('post_id', $this->id)->count();
  }

  Public function likeCount() {
    return Like::where('post_id', $this->id)->count();
  }

  Public function getLikeId($user) {
    $like = Like::where('user_id', $user->id)->where('post_id', $this->id)->get();

    return $like[0]->id;
  }
}
