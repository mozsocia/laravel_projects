@extends('layouts.app')

@section('content')

  @if (session()->has('status'))
    <div class="alert alert-primary mt-4" role="alert">
      {{ session()->get('status') }}
    </div>
  @endif


  <H1 class="my-4">THis is blog page</H1>
  <hr>
  <p>Want to Create a new post?</p>
  <a type="button" class="btn btn-pink accent-4 mb-4" href="{{ route('posts.create') }}"> Create Post</a>

  <hr class="mb-4">
  @foreach ($posts as $item)
    {{-- <h3><a href="{{ route('posts.show',['post'=>$item->id]) }}">{{ $item->title}}</a></h3> --}}

    <div class="card border-secondary mb-3">
      {{-- <div class="card-header">{{ $item->title}}</div> --}}
      <div class="card-body purple-text">

        <h5 class="card-title">{{ $item->title }}</h5>
        <p class="card-text">{{ $item->body }}</p>


        <a href="{{ route('posts.show', ['post' => $item->id]) }}" class="btn btn-sm btn-purple">MORE</a>

      </div>
      <div class="card-footer">
        <div class="row">
          <div class="col-md-6 border-right">
            <small class="text-muted">Created at : {{ $item->created_at->diffForHumans() }} </small>
            <small class="text-muted"> :- {{ $item->created_at->format('Y-m-d') }}</small>
          </div>
          <div class="col-md-6">
            <small class="text-muted">Updated at : {{ $item->updated_at->diffForHumans() }} </small>
            <small class="text-muted"> :- {{ $item->updated_at->format('Y-m-d') }}</small>
          </div>
        </div>
        
      </div>
    </div>
  @endforeach

@endsection
