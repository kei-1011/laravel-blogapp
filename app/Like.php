<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Posts;

class Like extends Model
{
    Public function user() {
        return $this->belongsTo('App\User');
    }
    Public function posts() {
        return $this->belongsTo('App\Post');
    }
}
