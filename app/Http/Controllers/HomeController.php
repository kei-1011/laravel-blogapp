<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        $data = [
            'text'  => 'Hello World',
        ];
        return view('home',$data);
    }
}
