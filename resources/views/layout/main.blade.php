<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body>
    @yield('content')
    <div class="container px-8 fixed bottom-3 right-0 left-0 bg-gray-300 py-5 shadow-lg text-black">
        <div class="flex">
            <div class="flex flex-col items-center mr-9">
                <img src="/assets/icon/burger.svg" alt="burger" class="h-6 w-6">
                <span>Daftar</span>
            </div>
            <div class="flex flex-col items-center mr-[108px]">
                <img src="/assets/icon/berita.svg" alt="burger" class="h-6 w-6">
                <span>Berita</span>
            </div>
            {{-- start scan --}}
            <a href="/scan">
                <div class="flex w-fit bottom-5 left-[50%] z-10 absolute bottom-14 inset-x-0 flex-col items-center" style="transform: translate(-50%, -50%);">
                    <img src="/assets/icon/scan.svg" alt="burger" class="h-6 w-6">
                    <span>Scan</span>
                </div>
                <div class="flex w-fit -bottom-3 left-[50%] absolute bottom-[42px] inset-x-0 flex-col items-center" style="transform: translate(-50%, -50%);">
                    <img src="/assets/icon/hexagon.svg" alt="burger" class="h-20 w-20">
                </div>
            </a>
            {{-- end scan --}}
            <a href="/about">
                <div class="flex flex-col items-center mr-9">
                    <img src="/assets/icon/grup.svg" alt="burger" class="h-6 w-6">
                    <span>Tentang</span>
                </div>
            </a>
            <a href="/store">
            <div class="flex flex-col items-center">
                <img src="/assets/icon/keranjang.svg" alt="burger" class="h-6 w-6">
                <span>Store</span>
            </a>    
            </div>
        </div>
    </div>
</body>

</html>
