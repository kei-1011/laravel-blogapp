<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function showSettingForm()
    {
        $posts = Auth::user()->posts()->get();

        return view('setting.account', [
            'posts' =>  $posts
        ]);
    }

    public function setting(Request $request) {

        $user =Auth::user();

        $user->screen_name = $request->screen_name;
        $user->email = $request->email;
        $user->twitter = $request->twitter;
        $user->referral = $request->referral;
        if ($request->profile_image !=null) {
            // ファイルを保存
            $request->file('profile_image')->storeAs('public/images/user', $user->id . '.jpg');

            // db にファイルパスを保存
            $user->profile_image = Auth::user()->id . '.jpg';
        }
        $user->save();

        return redirect()->route('setting.account');
    }
}
