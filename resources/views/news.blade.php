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
            <div class="flex items-center justify-center py-4 pb-3">
                <h1 class=" text-center text-lg font-bold text-white tracking-wider">News</h1>
                <div class=" absolute right-3 space-x-6">
                    <a href="/home">
                        <img src="/assets/icon/home.svg" class="h-4 w-4" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    @section('content')
        <div class="p-5">
            <div class="flex items-center gap-2 mb-5">
                <img src="/assets/icon/berita.svg" alt="burger" class="h-4">
                <h1 class="text-lg font-bold tracking-wider text-green-700">What's new?</h1>
            </div>
            <div class="flex justify-between">
                <div class="flex items-center gap-2">
                    <img src="/assets/icon/closed.svg" alt="burger" class="h-4">
                    <h2 class="text-sm">New Products added </h2>
                </div>
                <div class="flex items-center gap-2">
                    <h2 class="text-sm text-gray-400  tracking-wider font-thin">View all</h2>
                    <img src="/assets/icon/arrow.svg" alt="burger" class="h-4">
                </div>
            </div>

        </div>
    @endsection
</body>

</html>
