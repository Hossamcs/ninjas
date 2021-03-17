@extends('layouts.app')

@section('content')
<x-post :post="$post" />
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script>
     $('.likeBtn').on('click',function(e){
      let postId=e.target.parentNode.parentNode.dataset;
       $.ajax({
         method: 'POST',
         url: "/posts/"+postId.postid+"/likes",
         data: {
          "_token": "{{ csrf_token() }}"
         },
         success:function(){e.target.remove();}
       });
     }) ;
     $('.disLikeBtn').on('click',function(e){
      let postId2=e.target.parentNode.parentNode.dataset;
    e.preventDefault();
    $.ajax({
         type: 'POST',
         url: "/posts/"+postId2.postid+"/likes",
         data: {
          "_method": 'DELETE',
          "_token": "{{ csrf_token() }}"
         },
         success:function(){e.target.remove();}
       }); 
     })
   </script>
@endsection