@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
      <div class="w-8/12">
        <h1 class="text-blue-600 font-extrabold mb-1 ">{{$user->username}}</h1>
        <p class="text-gray-400 font-bold mb-1">Posted : {{$posts->count()}} {{Str::plural('post', $posts->count())}}</p>
        <p class="text-gray-400 font-bold mb-1">Liked : {{$user->recievedlikes->count()}} {{Str::plural('like', $user->recievedlikes->count())}}</p>
      </div>
    </div>
   
  @if($posts)
    @foreach($posts as $post)
        <x-post :post="$post" />
    @endforeach
    <div class="flex justify-center ">
      <div class="w-4/12 bg-red-600 p-5  rounded-lg mb-3"> 
          <span class="">  {{$posts->links()}}</span>
      </div>
    </div> 
   
   @else
   <div class="flex justify-center ">
      <div class="w-4/12 bg-red-600 p-5  rounded-lg mb-3"> 
      <span>{{$user->username}} doesn't has posts yet</span>
      </div>
    </div> 
    
   @endif
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
       console.log(postId2.postid)
     })
   </script>
@endsection