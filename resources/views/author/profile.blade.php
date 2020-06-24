@extends('layouts.app')

@section('content')

<div class="container home-article-list">
    <div class="row justify-content-center">
        <div class="col-md-12">
        <div class="col-md-4">
            <div class="panel panel-default">
                <p>{{ $user->name }}</p>
                <p>{{ $user->email }}</p>
            </div>

        </div>
        <div class="col-md-8">
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
</div>
@endsection
