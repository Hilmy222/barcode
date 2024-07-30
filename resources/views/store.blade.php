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
        <div class="p-2 bg-gray-100 mx-auto min-h-screen">
            <div class="grid grid-cols-2 gap-3 mb-28">
                <a href="https://nothanksshop.myshopify.com/products/unisex-heavyweight-t-shirt">
                    <div class="flex flex-col items-center gap-2">
                        <img class="w-36 h-36 mx-auto"
                            src="https://nothanksshop.myshopify.com/cdn/shop/files/unisex-heavyweight-t-shirt-red-s-clothes-844.webp?v=1714414772"
                            alt="">
                        <span class="text-xs mm:text-[13px] ml:text-sm mx-auto tracking-wider">Unisex heavyweight
                            t-shirt</span>
                    </div>
                </a>
                <a href="https://nothanksshop.myshopify.com/products/unisex-no-thanks-t-shirt">
                    <div class="flex flex-col items-center gap-2">
                        <img class="w-36 h-36 mx-auto rounded-lg"
                            src="https://nothanksshop.myshopify.com/cdn/shop/files/unisex-garment-dyed-heavyweight-t-shirt-red-back-662d95435cb34.jpg?v=1714263391&width=1100"
                            alt="">
                        <span class="text-xs mm:text-[13px] ml:text-sm">Unisex No Thanks t-shirt</span>
                    </div>
                </a>
                <a href="https://nothanksshop.myshopify.com/products/palestine-hoodie-women-designer-graphic-female">
                    <div class="flex flex-col items-center gap-2">
                        <img class="w-36 h-36 mx-auto rounded-lg"
                            src="https://nothanksshop.myshopify.com/cdn/shop/files/palestine-hoodie-women-designer-graphic-female-kw11111-khaki-l-clothes-813.webp?v=1714413202&width=1100"
                            alt="">
                        <span class="text-xs mm:text-[13px] ml:text-sm mx-auto tracking-wider">Palestina Hoodie
                            Women...</span>
                    </div>
                </a>
                <a
                    href="https://nothanksshop.myshopify.com/products/cotton-military-shemagh-tactical-desert-arab-scarf-110x110cm-unisex-winter-keffiyeh-windproof-thick-muslim-scarves">
                    <div class="flex flex-col items-center gap-2">
                        <img class="w-36 h-36 mx-auto rounded-lg"
                            src="https://nothanksshop.myshopify.com/cdn/shop/files/cotton-arab-scarf-110x110cm-unisex-winter-keffiyeh-windproof-thick-muslim-scarves-clothes-152.webp?v=1714413300&width=1100"
                            alt="">
                        <span class="text-xs mm:text-[13px] ml:text-sm">Cotton Arab Scraf</span>
                    </div>
                </a>
                <a href="https://nothanksshop.myshopify.com/products/unisex-heavy-blend-zip-hoodie">
                    <div class="flex flex-col items-center gap-2">
                        <img class="w-36 h-36 mx-auto rounded-lg"
                            src="https://nothanksshop.myshopify.com/cdn/shop/files/unisex-heavy-blend-zip-hoodie-black-s-812.webp?v=1714413739&width=1100"
                            alt="">
                        <span class="text-xs mm:text-[13px] ml:text-sm mx-auto tracking-wider">Unisex heavy blend zip
                            h...</span>
                    </div>
                </a>
                <a href="https://nothanksshop.myshopify.com/products/palestinian-tough-case-for-iphone®">
                    <div class="flex flex-col items-center gap-2">
                        <img class="w-36 h-36 mx-auto rounded-lg"
                            src="https://nothanksshop.myshopify.com/cdn/shop/files/palestinian-tough-case-for-iphone-r-glossy-11-569.webp?v=1714413461&width=1100"
                            alt="">
                        <span class="text-xs mm:text-[13px] ml:text-sm tracking-wider">Palestinian Tough Case f...</span>
                    </div>
                </a>
            </div>
        </div>
    @endsection
</body>

</html>
