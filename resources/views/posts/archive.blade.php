@extends('layouts.app')

@section('content')
{{-- @php
    var_dump($res);
@endphp --}}
<div class="container home-article-list">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <ul class="list-group">
                @foreach($posts as $post)

            <li class="list-group-item js-post_block" data-id="{{ $post->id }}">
              <div class="posts_wrap">
                <div class="posts_left">
                <input type="checkbox" name="delete_post[]" class="delete_post" data-id="{{ $post->id }}">
                  <a class='title' href="{{ route('posts.article', ['user' => Auth::user()->name, 'id' => $post->id, 'user_id' => Auth::id()] ) }} ">{{ $post->title }}</a>
                  <p class='mb-0'>
                    <span class="user">by {{ Auth::user()->name }}</span>
                    <span class="create_date">{{ $post->created_at->format('Y年m月d日') }}</span>
                  </p>
                </div>
                <div class="posts_edit">
                  <a href="{{ route('posts.edit', ['id' => $post->id] ) }}" class="edit_button">編集</a>
                </div>
              </div>
            </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
<div class="sticky_delete_block container">
  <div class="row justify-content-center">
    <div class="col-md-9">
      <div class="delete-btn_wrap">
        <div class="left">
          <span id="js_reset_checkbox">
            <i class="fas fa-times"></i>
          </span>
          <span><span id="js_calc_delete_posts"></span> 選択しています。</span>
        </div>
        <button type="button" class="btn btn-danger" id="ajax_post_delete">削除する</button>
      </div>
    </div>
  </div>
</div>
@endsection
