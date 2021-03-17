@extends('layouts.app')

@section('content')

 @auth
 <div class="flex justify-center ">
  <div class="w-8/12 bg-red-600 p-6 rounded-lg mb-7">
    <form action="{{route('posts')}}" method="post">
      @csrf
      <div class="mb-4">
      <label for="body" class="sr-only">Body</label>
      <textarea name="body" id="body" cols="30" rows="4"
      class="bg-gray-100 border-2 w-full p-4 rounded-lg  
      @error('body') border-red-600 @enderror" placeholder="What's in your mind...?!"
      ></textarea>
      @error('body')
      <span class="text-gray-700 mt-2 text-sm"># {{$message}}</span>
      @enderror
      </div>
      <div>
      <button type="submit" class="bg-blue-500 text-white px-4 py-2 
      rounded font-medium">Post</button>
     </div>
    </form>
   </div>
  </div>
 @endauth
 

   @if($posts)
    @foreach($posts as $post)
        <x-post :post="$post" />
    @endforeach
    <div class="flex justify-center ">
      <div class="w-24/24 bg-red-600 p-5  rounded-lg mb-3"> 
          <span>  {{$posts->links()}}</span>
      </div>
    </div> 
   
   @else
     <span>There are no posts yet...</span>
   @endif
   

   <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   <script>
     $('.likeBtn').on('click',function(e){
      let postId=e.target.parentNode.parentNode.dataset;
     e.preventDefault();
       $.ajax({
         method: 'POST',
         url: "posts/"+postId.postid+"/likes",
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
         url: "posts/"+postId2.postid+"/likes",
         data: {
          "_method": 'DELETE',
          "_token": "{{ csrf_token() }}"
         },
         success:function(){e.target.remove();}
       }); 
     
     })
   </script>
@endsection