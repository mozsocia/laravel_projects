@extends('layouts.app')

@section('content')


    @if (session()->has('status'))
    <div class="alert alert-primary mt-4" role="alert">
      {{ session()->get('status')}}
    </div>
    @endif
    
    
    <H1 class="my-4">THis is Posts Details</H1>
    <hr>

    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Title: {{ $post->title}}</h5>
        <p class="card-text">Body : {{ $post->body }}</p>
        <a href="{{ route('posts.edit',['post'=>$post->id])}}" class="btn btn-default btn-sm">Eidt</a>
        <a href="#!" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#centralModalDanger">Delete</a>
       
      </div>
    </div>


 <!-- Central Modal Medium Danger -->
 <div class="modal fade" id="centralModalDanger" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
   aria-hidden="true">
   <div class="modal-dialog modal-notify modal-danger" role="document">
     <!--Content-->
     <div class="modal-content ">
       <!--Header-->
       <div class="modal-header">
         <p class="heading lead">Delete Warning</p>

         <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true" class="white-text">&times;</span>
         </button>
       </div>

       <!--Body-->
       <div class="modal-body">
         <div class="text-center">
          <i class="fas fa-trash-alt fa-4x animated rotateIn mb-2"></i>
          
           <p>Are youe sure ? you want to DELETE?.</p>
         </div>
       </div>

       <!--Footer-->
       <div class="modal-footer justify-content-center">


        <form action={{ route('posts.destroy',['post'=>$post->id]) }}  method="POST">
          @csrf
          @method('DELETE') 

         <button type="submit" class="btn btn-danger">DELETE</button>

        </form>



         <a type="button" class="btn btn-outline-danger waves-effect" data-dismiss="modal">No, thanks</a>
       </div>
     </div>
     <!--/.Content-->
   </div>
 </div>
 <!-- Central Modal Medium Danger-->


@endsection