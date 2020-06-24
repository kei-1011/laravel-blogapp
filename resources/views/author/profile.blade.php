@extends('layouts.app')

@section('content')

<div class="container home-article-list">
    <div class="row justify-content-center">
        <div class="col-md-3">
            <div class="profile-panel">
                <p class='user_name'>{{ $user->name }}</p>
            </div>

        </div>
        <div class="col-md-9">
            <ul class="list-group">
                @foreach($posts as $post)
            <li class="list-group-item">
                <a class='title' href="{{ route('posts.article', ['user' => $user->name,'id' => $post->id] ) }} ">{{ $post->title }}</a>
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
