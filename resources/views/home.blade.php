@extends('layouts.app')

@section('content')
<div class="container home-article-list">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <ul class="list-group">
                @foreach($posts as $post)
            <li class="list-group-item">
                <a class='title' href="{{ route('posts.article', ['user' => $post->user->name,'id' => $post->id ] ) }} ">{{ $post->title }}</a>
                <p class="excerpt">{{ $post->body }}</p>
                <p class='mb-0'>
                    <span class="user">by <a href="{{ route('author.profile',['user' => $post->user->name , 'user_id' => $post->user->id])}}">{{ $post->user->name }}</a></span>
                    <span class="create_date">{{ $post->created_at->format('Y年m月d日') }}</span>
                </p>
            </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
