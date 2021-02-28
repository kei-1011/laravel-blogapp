@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
          <section class='article'>
            <div class="article__head">
              <span class="user"><a href="{{ route('author.profile',['user' => $post->user->name]) }}">by {{ $post->user->name }}</a></span>
              <span class="article__created-at">{{ $post->created_at->format('Y年m月d日') }}に更新</span>
            </div>
              <h1 class='article__heading'>{{ $post->title }}</h1>
              <div class="contents">
                {!! nl2br($post->body) !!}
              </div>
          </section>
        </div>
    </div>
</div>
@endsection
