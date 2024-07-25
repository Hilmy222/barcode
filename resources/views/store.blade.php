@extends('layout.main')
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  @vite('resources/css/app.css')
</head>
<body>
  <div>
    <div class="bg-green-700 opacity-700">
        <div class="flex items-center justify-center pt-8 pb-4">
            <h1 class=" text-center text-xl font-bold text-white tracking-wider">NO Thanks! Store</h1>
            <div class="flex items-center absolute right-3 space-x-6">
                <a href="/home">
                <img src="/assets/icon/home.svg" class="h-5 w-5" alt="">
                </a>
            </div>
        </div>
    </div>
</div>
    @section('content')
    <div class="container p-5 mx-auto">
      
    </div>
    @endsection
</body>
</html>