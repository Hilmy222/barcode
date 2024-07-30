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
    <div class="w-[430px] mx-auto px-5 fixed bottom-0 bg-gray-300 mm:py-1 ml:py-2 shadow-lg text-black">
        <a href="/daftar">
        <div class="flex items-center gap-5">
            <div class="flex flex-col items-center">
                <img src="/assets/icon/burger.svg" alt="burger" class="h-9">
                <span class="text-xs mm:text-base">Daftar</span>
            </div>
        </a>
            <a href="/news">
                <div class="flex flex-col items-center">
                    <img src="/assets/icon/berita.svg" alt="burger" class="h-9">
                    <span class="text-xs mm:text-base">Berita</span>
                </div>
            </a>
            {{-- start scan --}}
            <a href="/scan">
                <div class="flex flex-col items-center mx-11 -mt-14 bg-white">
                    <img src="/assets/icon/scan.svg" alt="burger" class="h-9">
                    <span class="text-xs mm:text-base">Scan</span>
                </div>
            </a>
            {{-- end scan --}}
            <a href="/about">
                <div class="flex flex-col items-center">
                    <img src="/assets/icon/grup.svg" alt="burger" class="h-9">
                    <span class="text-xs mm:text-base">Tentang</span>
                </div>
            </a>
            <a href="/store">
                <div class="flex flex-col items-center">
                    <img src="/assets/icon/keranjang.svg" alt="burger" class="h-9">
                    <span class="text-xs mm:text-base">Store</span>
                </div>
            </a>
        </div>
    </div>
    </div>
</body>

</html>
