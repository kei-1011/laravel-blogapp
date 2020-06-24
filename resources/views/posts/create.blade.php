@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
          @if($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach($errors->all() as $message)
                  <li>{{ $message }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form action="{{ route('posts.create') }}" method="POST" class='create editor'>
            @csrf
            <div class="form-group">
              <input type="text" name="title" id="title" class='form-control' placeholder="タイトル"/>
            </div>
            <div class="form-group">
              <textarea class="form-control" id="body" name='body' placeholder="記事の内容をここに書こう"></textarea>
            </div>
            <div class="form-group text-right">
              <button type="submit" class="btn btn-primary"><span class="fas fa-upload mr-1"></span>記事を投稿</button>
            </div>
          </form>
        </div>
    </div>
</div>
@endsection
