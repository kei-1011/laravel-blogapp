@extends('layouts.app')

@section('content')
<div class="container home-article-list">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <ul class="list-group">
                @foreach($posts as $post)
            <li class="list-group-item">
                <a class='title' href="{{ route('posts.article', ['id' => $post->id ] ) }} ">{{ $post->title }}</a>
                <p class="excerpt">{{ $post->body }}</p>
                <p class='mb-0'>
                    <span class="user">by <a href="{{ route('author.profile',['user' => $post->user->name , 'user_id' => $post->user->id])}}">{{ $post->user->name }}</a></span>
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
                                <span class="js-like_id" id="like-id_{{$post->id}}">

                            @endif
                        @else
                            <i class="far fa-heart like-icon"></i>
                            <span class="like_count">{{$post->likeCount()}}</span>
                        @endif
                    </span>
                </p>
            </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
