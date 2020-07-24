<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Follow;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\DB;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts() {
        return $this->hasMany('App\Posts');
    }

    public function likes() {
        return $this->hasMany('App\Like');
    }
    public function follows() {
        return $this->belongsToMany('App\User', 'user_id', 'following_id')->withTimestamps();
    }

    public function followers() {
        return Follow::where('user_id', $this->id)->count();
    }

    public function followCount() {
        return Follow::where('following_id', $this->id)->count();
    }

    public function isfollow(int $user_id) {
        $res = DB::table('follows')
        ->where('user_id', $user_id)
        ->where('following_id', Auth::user()->id)->count();

        return $res;
    }
}
