@extends('layout.main')

@section('content')
    <div>
        <div class="bg-red-500">
            <div class="text-white pb-12">
                <h1 class="py-9 text-center text-xl font-bold tracking-wider">Boycott List</h1>
                <p class="px-5 tracking-wider">Search boycotted products by Brand name,<br>Product name or barcode number.
                </p>
            </div>
        </div>
        <div class="-mt-5 ">
            <form class="mx-9 flex justify-between py-2 px-6 rounded-full bg-gray-200">
                <input type="text" placeholder="Type a brand name" class="outline-none bg-transparent">
                <a href="/scan">
                    <div class="flex gap-3">
                        <p class="text-gray-400">Or Scan</p>
                        <img src="assets/icon/scan.svg" class="h-7" alt="">
                    </div>
                </a>
            </form>
        </div>
        <div class="my-2 mx-4 grid grid-cols-3 gap-4">
            <div class="relative">
                <div class="bg-card p-4 rounded-lg text-center  hover:bg-gray-100">
                    <h1 class="mb-2  font-mono text-sm">Muskaraa</h1>
                    <img src="assets/icon/scan.svg" alt="5 Gum" class="mx-auto mb-2  border rounded-lg" />
                </div>
            </div>
            <div class="relative">
                <div class="bg-card p-4 rounded-lg text-center  hover:bg-gray-100">
                    <h1 class="mb-2  font-mono text-sm">Muskaraa</h1>
                    <img src="assets/icon/scan.svg" alt="5 Gum" class="mx-auto mb-2  border rounded-lg" />
                </div>
            </div>
            <div class="relative">
                <div class="bg-card p-4 rounded-lg text-center  hover:bg-gray-100">
                    <h1 class="mb-2  font-mono text-sm">Muskaraa</h1>
                    <img src="assets/icon/scan.svg" alt="5 Gum" class="mx-auto mb-2  border rounded-lg" />
                </div>
            </div>
            <div class="relative">
                <div class="bg-card p-4 rounded-lg text-center  hover:bg-gray-100">
                    <h1 class="mb-2  font-mono text-sm">Muskaraa</h1>
                    <img src="assets/icon/scan.svg" alt="5 Gum" class="mx-auto mb-2  border rounded-lg" />
                </div>
            </div>
        </div>
    </div>
@endsection
