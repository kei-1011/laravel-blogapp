@extends('layouts.app')

@section('content')

<div class="container home-article-list">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="profile-panel">
                <div class="btn-wrap">
                    <button type="button" id="ac-menu_open"><i class="fas fa-ellipsis-h"></i></button>
                </div>
                <p class="profile_image mb-3">
                    <img src="{{Auth::user()->profile_image}}" alt="">
                </p>
                <p class="screen_name mb-0 text-center">{{Auth::user()->screen_name}}</p>
                <p class="name text-center">{{Auth::user()->name}}</p>
                <p class="twitter text-center">
                    <a href="https://twitter.com/{{Auth::user()->twitter}}"><i class="fab fa-twitter"></i></a>
                </p>
                <p class="referral">{{Auth::user()->referral}}</p>
            </div>
        </div>
        <div class="col-md-9">
            {{-- <div class="profile-panel"> --}}
                <ul class="list-group">
                    @foreach($posts as $post)
                <li class="list-group-item">
                    <a class='title' href="{{ route('posts.article', ['id' => $post->id ] ) }} ">{{ $post->title }}</a>
                    <p class="excerpt">{{ $post->body }}</p>
                    <p class='mb-0'>
                        <span class="user">by <a href="{{ route('author.profile',['user' => $post->user->name , 'user_id' => $post->user->id])}}">{{ $post->user->name }}</a></span>
                        <span class="create_date">{{ $post->created_at->format('Y年m月d日') }}</span>
                    </p>
                </li>
                @endforeach
                </ul>
            {{-- </div> --}}
        </div>
    </div>
</div>
@endsection
