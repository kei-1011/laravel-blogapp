<?php

namespace App\Http\Controllers;

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
}
