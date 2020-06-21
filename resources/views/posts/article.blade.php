@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
          <section>
              <h2>{{ $post->title }}</h2>
              <div class="contents">
                {{ $post->body }}
              </div>
          </section>
        </div>
    </div>
</div>
@endsection
