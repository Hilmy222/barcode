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
            <div class="flex items-center justify-center py-9 pb-3">
                <h1 class=" text-center text-xl font-bold text-white tracking-wider">About us</h1>
                <div class="flex items-center absolute right-3 space-x-6">
                    <img src="/assets/icon/setting.svg" class="h-5 w-5" alt="">
                    <a href="/home">
                        <img src="/assets/icon/home.svg" class="h-4 w-4" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
    @section('content')
        <div class="container p-5 mx-auto max-w-[425px]">
            <img src="/assets/img/about1.jpeg" class="w-[380px] h-[134px] rounded-xl object-cover" alt="">
            <p class="text-sm tracking-wide text-justify py-3">Boycotting is important as it empowers individuals to
                leverage their purchasing choices as a form of protest, compelling businesses to align with ethical
                standards and social responsibility.</p>
            <img src="/assets/img/about2.png" class="w-[380px] h-[134px] rounded-xl object-cover" alt="">
            <p class="text-sm tracking-wide text-justify py-3">I'm Ahmed Bashbash, a Palestinian developer, I got the idea
                to help the boycott movement by making an app that help people to know which products is in the boycott
                list, the app idea is so simple, just to scan the product you wanna buy and the app would tell you if that
                product is in the list ot not.</p>
        </div>
    @endsection
</body>

</html>
