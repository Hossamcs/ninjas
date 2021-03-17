@props(['post' => $post])
<div class="flex justify-center ">
      <div class="w-8/12 bg-white p-4 rounded-lg mb-3" data-postId="{{$post->id}}">
         <a href="{{route('users.posts',$post->user)}}" class="text-blue-600 font-bold">{{$post->user->username}}</a> 
          <span class="text-gray-400 text-xs ">{{$post->created_at->diffForHumans()}}</span>
         <br>
          <span class="">{{$post->body}}</span> <br>
          <a href="{{route('posts.show',$post)}}" class="relative right-0"> <i class="fas fa-eye text-gray-400 hover:text-gray-900 "></i></a>
          <div class="p-2 mt-2 bg-gray-100 rounded inline-block items-center">
         <!-- <i class="fas fa-democrat p-2 cursor-pointer  hover:text-gray-900  text-gray-400"></i> <i class="far fa-thumbs-up p-2 cursor-pointer  hover:text-gray-900  text-gray-400"></i> <i class="far fa-thumbs-down p-2 cursor-pointer hover:text-gray-900  text-gray-400"></i> <i class="fas fa-chart-line p-2 cursor-pointer  hover:text-gray-900  text-gray-400"></i> -->
         @auth
         @if(!$post->likedBy(auth()->user()))
         <button class="likeBtn hover:bg-green-600 rounded ">👍</button>
        
        <!-- <form action="{{route('posts.likes', $post)}}" method="POST" class="mr-1" id="likeForm" >
         @csrf
           <button id="likeBtn"><i class="far fa-thumbs-up hover:text-gray-900  text-gray-400"></i></button>
          </form> -->
          @else
        <!--  <form action="{{route('posts.likes', $post)}}" method="POST" class="mr-1" >
           @csrf
            @method('DELETE') 
             <button id="delBtn" ><i class="far fa-thumbs-down hover:text-gray-900  text-gray-400"></i></button>
          </form>-->
       <button class="disLikeBtn hover:bg-red-600 rounded ">👎︎</button>   
          @endif
          @endauth
          <span class="text-indigo-500"> &nbsp; {{$post->likes->count()}} {{Str::plural('like', $post->likes->count())}} </span>
               @if (!$post->likes->count())
               <i class="fas fa-democrat p-2 cursor-pointer  hover:text-gray-900  text-gray-400"></i> 
               @else 
               <i class="fas fa-chart-line p-2 cursor-pointer  hover:text-gray-900  text-gray-400"></i>
               @endif
          </div>
       @can('delete',$post)
        <form action="{{route('posts.destroy',$post)}}" method="POST" class="mt-2" >
           @csrf
            @method('DELETE') 
             <button id="delBtn" class="text-blue-600 w-40 bg-gray-200 rounded hover:bg-red-900 hover:text-white p-2" >Delete</button>
          </form>
       @endcan
      </div>
    </div>  