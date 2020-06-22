@extends('layouts.app')

@section('content')
<div class="container home-article-list">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <ul class="list-group">
                @foreach($posts as $post)
            <li class="list-group-item">
                <p class="create_date">{{ $post->created_at->format('Y年m月d日') }}</p>
                <a href="{{ route('posts.article', ['id' => $post->id, 'user_id' => $post->user_id] ) }} ">{{ $post->title }}</a>
                <p class="excerpt">{{ $post->body }}</p>
            </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
