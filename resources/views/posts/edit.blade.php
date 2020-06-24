@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          <form action="{{ route('posts.create') }}" method="POST" class='edit editor'>
            @csrf
            <div class="form-group">
              <input type="text" name="title" id="title" class='form-control' placeholder="タイトル" value='{{ $post->title }}'/>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="body" name='body' placeholder="記事の内容をここに書こう">{{ $post->body }}</textarea>
            </div>
            <div class="form-group text-right">
              <button type="submit" class="btn btn-primary"><span class="fas fa-upload mr-1"></span>記事を更新</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
