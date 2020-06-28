@extends('layouts.app')

@section('content')
<div class="container home-article-list">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <ul class="list-group">
                @foreach($posts as $post)

            <li class="list-group-item">
              <div class="posts_wrap">
                <div class="posts_left">
                  <a class='title' href="{{ route('posts.article', ['user' => Auth::user()->name, 'id' => $post->id, 'user_id' => Auth::id()] ) }} ">{{ $post->title }}</a>
                  <p class='mb-0'>
                    <span class="user">by {{ Auth::user()->name }}</span>
                    <span class="create_date">{{ $post->created_at->format('Y年m月d日') }}</span>
                  </p>
                </div>
                <div class="posts_edit">
                  <a href="{{ route('posts.edit', ['user' => Auth::user()->name, 'id' => $post->id, 'user_id' => Auth::id()] ) }}" class="edit_button">編集</a>
                </div>
              </div>
            </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
