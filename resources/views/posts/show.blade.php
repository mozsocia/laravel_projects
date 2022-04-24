@extends('layouts.app')

@section('content')
  <div class="card mb-3 shadow-sm mt-5">
    <div class="card-body">
      <h2 class="card-title">{{ $post->title }}</h2>

      <p class="card-text">{{ $post->body }}</p>

      <p>By {{ $post->user->name }}</p>

      @auth

        @if (auth()->user()->id == $post->user_id)
          <a href="{{ route('post.edit', ['post' => $post->id]) }}" class="card-link btn btn-outline-secondary">
            edit
          </a>
          <!-- Button trigger modal -->
          <button type="button" class="card-link btn btn-outline-danger" data-toggle="modal" data-target="#exampleModal">
            Delete
          </button>
        @endif
      @endauth
    </div>
  </div>






  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">


        <div class="modal-header">
          <h5 class="modal-title text-danger h2" id="exampleModalLabel">Warning</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body  text-center">
          <span class="text-danger h4">Are You Sure Want to Delete????</span>
        </div>



        <div class="modal-footer">

          <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Close</button>

          <a class="card-link btn btn-danger"
            onclick="event.preventDefault();
                                                                                                 document.getElementById('delete-form').submit();">
            {{ __('Delete') }}
          </a>

          <form id="delete-form" action="{{ route('post.destroy', ['post' => $post->id]) }}" method="POST">
            @csrf
            @method('DELETE')
            {{-- <button type='submit' class="card-link btn btn-danger">
              Delete
            </button> --}}
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection
