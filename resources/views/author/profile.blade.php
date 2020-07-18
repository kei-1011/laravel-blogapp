@extends('layouts.app')

@section('content')

<div class="container home-article-list">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="profile-panel text-center">
                {{-- <div class="btn-wrap">
                    <button type="button" id="ac-menu_open">
                        <i class="fas fa-ellipsis-h"></i>
                    </button>
                </div> --}}
                <p class="profile_image mb-3">
                    <img src="{{$user->profile_image}}" alt="">
                </p>
                <p class="screen_name mb-0 text-center">{{$user->screen_name}}</p>
                <p class="name text-center">{{$user->name}}</p>
                <p class="twitter text-center">
                    <a href="https://twitter.com/{{$user->twitter}}"><i class="fab fa-twitter"></i></a>
                </p>
                <p class="referral">{{$user->referral}}</p>
                @if (Auth::check())
                    <a href="{{route('setting.account')}}" class="account-settiong">プロフィールを編集</a>

                @else
                    <button type='button' id='follow_btn' class='btn btn-primary'>フォローする</button>
                @endif
            </div>

        </div>
        <div class="col-md-9">
            <ul class="list-group">
                @foreach($posts as $post)
            <li class="list-group-item">
                <a class='title' href="{{ route('posts.article', ['user' => $user->name,'id' => $post->id, 'user_id' => Auth::id()] ) }} ">{{ $post->title }}</a>
                <p class="excerpt">{{ $post->body }}</p>
                <p class='mb-0'>
                    <span class="user">by {{ $user->name }}</span>
                    <span class="create_date">{{ $post->created_at->format('Y年m月d日') }}</span>
                </p>
            </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
