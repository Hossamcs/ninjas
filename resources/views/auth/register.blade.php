@extends('layouts.app')

@section('content')
 <div class="flex justify-center ">
  
  <div class="w-4/12 bg-white p-6 rounded-lg">
    <form action="{{route('register')}}" method="post">
     @csrf
     <div class="mb-4">
       <label for="name" class="sr-only">Name</label>
       <input type="text" name="name" id="name"
       placeholder="Enter your name" value="{{old('name')}}"
       class="bg-gray-100 border-2 w-full p-4 rounded-lg 
       @error('name') border-red-500  @enderror " > 

       @error('name')
        <span class="text-red-700 mt-2 text-sm"># {{$message}}</span>
       @enderror
     </div>

     <div class="mb-4">
       <label for="username" class="sr-only">Username</label>
       <input type="text" name="username" id="username"
       placeholder="Enter your username" value="{{old('username')}}"
       class="bg-gray-100 border-2 w-full p-4 rounded-lg
       @error('username') border-red-500  @enderror "> 
       @error('username')
        <span class="text-red-700 mt-2 text-sm"># {{$message}}</span>
       @enderror
     </div>

     <div class="mb-4">
       <label for="email" class="sr-only">Email</label>
       <input type="text" name="email" id="email"
       placeholder="Enter your email" value="{{old('email')}}"
       class="bg-gray-100 border-2 w-full p-4 rounded-lg
       @error('email') border-red-500  @enderror "> 
       @error('email')
        <span class="text-red-700 mt-2 text-sm"># {{$message}}</span>
       @enderror
     </div>

     <div class="mb-4">
       <label for="password" class="sr-only">Password</label>
       <input type="password" name="password" id="password"
       placeholder="Enter your password" value="{{old('password')}}"
       class="bg-gray-100 border-2 w-full p-4 rounded-lg
       @error('password') border-red-500  @enderror "> 
       @error('password')
        <span class="text-red-700 mt-2 text-sm"># {{$message}}</span>
       @enderror
     </div>

     <div class="mb-4">
       <label for="password_confirmation" class="sr-only">Confirm password</label>
       <input type="password" name="password_confirmation" id="password_confirmation"
       placeholder="Confirm your password" value=""
       class="bg-gray-100 border-2 w-full p-4 rounded-lg"> 
       
     </div>

     <div>
      <button type="submit"
      class="bg-gray-900 text-white px-4 py-3 rounded
      font-medium w-full">Become a Ninja!</button>
     </div>
    </form>
  </div>
 </div>

@endsection