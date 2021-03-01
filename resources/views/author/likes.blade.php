@extends('layouts.app')

@section('content')

<div class="container profile-posts-list">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="profile-panel text-center">
                <p class="profile_image mb-3">
                    <img src="/storage/images/user/{{$user->profile_image}}" alt="">
                </p>
                <p class="screen_name mb-0 text-center">{{$user->screen_name}}</p>
                <p class="name text-center">{{$user->name}}</p>
                <p class="twitter text-center">
                    <a href="https://twitter.com/{{$user->twitter}}"><i class="fab fa-twitter"></i></a>
                </p>
                <div class="text-left">
                    <p class="referral">{{$user->referral}}</p>
                </div>
                <div class="data-count mb-3">
                    <div class="child">
                        <span>記事</span>
                        <span>{{$user->posts->count()}}</span>
                    </div>
                    <div class="child">
                        <span>フォロー</span>
                        <span>{{$user->followCount()}}</span>
                    </div>
                    <div class="child">
                        <span>フォロワー</span>
                        <span>{{$user->followers()}}</span>
                    </div>
                </div>
                @auth
                    @if (Auth::user()->id === $user->id)
                        <a href="{{route('setting.account')}}" class="account-settiong">プロフィールを編集</a>
                    @else
                        @if ($user->isfollow($user->id) === 0)
                            <div class="follow-btn">
                                <button type='submit' id='follow' class='follow btn btn-info' data-user='{{$user->id}}' data-follow='{{Auth::user()->id}}'>フォロー</button>
                            </div>
                        @else
                            <div class="follow-btn">
                                <button type='submit' id='unfollow' class='followed btn btn-primary' data-user='{{$user->id}}' data-follow='{{Auth::user()->id}}'>フォロー中</button>
                            </div>
                        @endif
                    @endif
                @endauth
            </div>

        </div>
        <div class="col-md-8">
            <ul class="posts-list-menu">
                <li>
                    <a href="{{ route('author.profile',['user' => $user->name])}}">全ての投稿</a>
                </li>
                <li>
                    <a href="{{ route('author.likes',['user' => $user->name])}}">いいね</a>
                </li>
            </ul>
            <ul class="list-group">
            @if (isset($empty))
            <li class="list-group-item">
                {{$empty}}
            </li>
            @else
                    @foreach($posts as $post)
                <li class="list-group-item">
                    <a class='title' href="{{ route('posts.article', ['user' => $user->name,'id' => $post->id] ) }} ">{{ $post->title }}</a>
                    <p class="excerpt">{{ $post->body }}</p>
                    <p class='mb-0'>
                        <span class="user">by {{ $post->user->name }}</span>
                        <span class="create_date">{{ $post->created_at->format('Y年m月d日') }}</span>
                        <span class="like btn-wrap">
                            @if(Auth::check())
                                @if ($post->likedBy(Auth::user()) > 0)
                                {{-- いいね済 --}}
                                    <button type="button" class="remove_like" data-user="{{$post->user->id}}" data-post="{{$post->id}}"><i class="fas fa-heart liked"></i>
                                    </button>
                                    <span class="like_count">{{$post->likeCount()}}</span>
                                    <span class="js-like_id" id="like-id_{{$post->id}}">
                                        {{ $post->getLikeId(Auth::user()) }}
                                    </span>
                                @else
                                    <button type="button" class="add_like" data-post="{{$post->id}}" data-user="{{$post->user->id}}"><i class="far fa-heart like-icon"></i>
                                    </button>
                                    <span class="like_count">{{$post->likeCount($post->id)}}</span>
                                @endif
                            @else
                                <i class="far fa-heart like-icon"></i>
                                <span class="like_count">{{$post->likeCount()}}</span>
                            @endif
                        </span>
                    </p>
                </li>
                @endforeach
            @endif

            </ul>
        </div>
    </div>
</div>
@endsection
