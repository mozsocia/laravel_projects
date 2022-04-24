@extends('layouts.app')

@section('content')
  <h2 class="mt-5 mb-3">
    @isset($post)
      Update Post
    @else
      Create New Post
    @endisset
  </h2>

  <div class="card">
    <div class="card-body">

      <form action="{{ isset($post) ? route('post.update', ['post' => $post->id]) : route('post.store') }}"
        method="POST">
        @csrf
        @isset($post)
          @method('PUT')
        @endisset



        <div class="form-group">
          <label for="title">Enter Title</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
            value="{{ old('title', isset($post) ? $post->title : '') }}" />
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>


        <div class="form-group">
          <label for="body">Enter Body</label>
          <textarea type="text" class="form-control @error('body') is-invalid @enderror" id="body"
            name="body">{{ old('body', isset($post) ? $post->body : '') }}</textarea>
          @error('body')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>

    </div>
  </div>
@endsection
