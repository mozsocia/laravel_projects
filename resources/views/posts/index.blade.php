@extends('layouts.app')

@section('content')
  <h1 class="">This is all Posts page</h1>


  <div class="">
    @foreach ($posts as $post)
      <div class="card mb-3 shadow-sm">
        <div class="card-body">
          <h5 class="card-title">{{ $post->title }}</h5>

          <p class="card-text">{{ $post->body }}</p>
          <p>By {{ $post->user->name }}</p>
          <a href="{{ route('post.show', ['post' => $post->id]) }}" class="card-link btn btn-outline-info">
            More
          </a>

        </div>
      </div>
    @endforeach
    {{ $posts->links('vendor.pagination.bootstrap-4') }}
  </div>
@endsection
