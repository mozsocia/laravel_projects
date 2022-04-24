@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">{{ __('Dashboard') }}</div>

          <div class="card-body">
            @if (session('status'))
              <div class="alert alert-success" role="alert">
                {{ session('status') }}
              </div>
            @endif

            {{-- {{ __('You are logged in!') }} --}}
            <div>
              <a class="btn btn-primary my-4" href="{{ route('post.create') }}">Create Post</a>
            </div>


            <div class="">
              @isset($posts)
                @foreach ($posts as $post)
                  <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                      <h5 class="card-title">{{ $post->title }}</h5>

                      <p class="card-text">{{ $post->body }}</p>
                      <a href="{{ route('post.show', ['post' => $post->id]) }}" class="card-link btn btn-outline-info">
                        More
                      </a>

                    </div>
                  </div>
                @endforeach
                {{ $posts->links('vendor.pagination.bootstrap-4') }}
              @else
                <p>You have no Posts</p>
              @endisset
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
