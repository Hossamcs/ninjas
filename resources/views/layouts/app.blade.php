<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
   
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  <title>Ninja Café</title>
</head>
<body class="bg-gray-200">
  <nav class="bg-gray-900 p-6 flex justify-between mb-6 text-white">
    <ul class="flex items-center">
      <li> <a href="{{route ('dashboard') }}" class="p-6 hover:bg-blue-100 hover:text-black rounded"> Home</a> </li>
      <li> <a href="{{route ('posts') }}" class="p-6 hover:bg-blue-100 hover:text-black rounded"> Posts</a> </li>
    </ul>
    <ul class="flex items-center">
    @auth
      <li> <a href="{{route('users.posts',auth()->user()->username)}}" class="p-6 hover:bg-blue-100 hover:text-black rounded"> {{auth()->user()->username}}</a> </li>
      <li> <form class="inline p-6 hover:bg-blue-100 hover:text-black rounded" action="{{route('logout')}}" method="post">
        @csrf
       <button typr="submit"> Logout</button> </form></li>
    @endauth

    @guest
    <li> <a href="{{route ('login') }}" class="p-6"> Login</a> </li>
    <li> <a href="{{route ('register') }}" class="p-6"> Register</a> </li>
    @endguest
    </ul>
  </nav>
    @yield('content')
</body>
</html>