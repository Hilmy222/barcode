<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>

<body class="w-[428px] mx-auto">
    @yield('content')
    <div class="w-[428px] mx-auto px-4 mm:px-5 ml:px-8 fixed bottom-0 bg-gray-300 mm:py-1 ml:py-2 shadow-lg text-black">
        <div class="flex items-center">
            <div class="flex flex-col items-center mr-5 mm:mr-6 ml:mr-9">
                <img src="/assets/icon/burger.svg" alt="burger" class="h-4">
                <span class="text-xs mm:text-base">Daftar</span>
            </div>
            <a href="/news">
            <div class="flex flex-col items-center">
                <img src="/assets/icon/berita.svg" alt="burger" class="h-4">
                <span class="text-xs mm:text-base">Berita</span>
            </div>
            </a>
            {{-- start scan --}}
            <a href="/scan">
                <div class="flex flex-col items-center mx-11 -mt-14 bg-white">
                    <img src="/assets/icon/scan.svg" alt="burger" class="h-9">
                    <span class="text-xs mm:text-base">Scan</span>
                </div>
                {{-- <div class="flex w-fit -bottom-3 left-[50%] absolute bottom-[42px] inset-x-0 flex-col items-center" style="transform: translate(-50%, -50%);">
                    <img src="/assets/icon/hexagon.svg" alt="burger" class="h-20 w-20">
                </div> --}}
            </a>
            {{-- end scan --}}
            <a href="/about">
                <div class="flex flex-col items-center mr-5 mm:mr-6 ml:mr-9">
                    <img src="/assets/icon/grup.svg" alt="burger" class="h-4">
                    <span class="text-xs mm:text-base">Tentang</span>
                </div>
            </a>
            <a href="/store">
                <div class="flex flex-col items-center">
                    <img src="/assets/icon/keranjang.svg" alt="burger" class="h-4">
                    <span class="text-xs mm:text-base">Store</span>
            </a>
        </div>
    </div>
    </div>
</body>

</html>
