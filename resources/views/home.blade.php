@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <ul class="list-group">
            @foreach($posts as $post)
            <li class="list-group-item">
                <a href="/{{ $post->id }}/post/{{ $post->user_id }}">{{ $post->title }}</a>
                <p class="excerpt">{{ $post->body }}</p>
            </li>
            @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
