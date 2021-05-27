@extends('layouts.app')

@section('content')

<div class="row justify-content-md-center"><div class="col-md-8 col-lg-6">
    <H1 class="mt-4 h2">Edit Posts</H1>

    @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

  <!-- Default form subscription -->
<form class="text-center border border-light py-4 px-5 my-4" action={{ route('posts.update',['post'=>$post->id]) }}  method="POST">
  @csrf
  @method('PUT')  
  <p class="h4 mb-4">Blog details</p>

  <p>Join our mailing list. We write rarely, but only the best content.</p>

  
  
  <!-- Name -->
  <input type="text" id="id_title" class="form-control mb-4" placeholder="Title" name="title" value="{{ old('title',$post->title) }}">

  <!-- Email -->
  <input type="text" id="id_body" class="form-control mb-4" placeholder="Body" name= "body" value="{{ old('body',$post->body) }}">

  <!-- Sign in button -->
  <button class="btn btn-purple btn-block" type="submit">UPDATE</button>


</form>
<!-- Default form subscription -->

</div></div>


@endsection