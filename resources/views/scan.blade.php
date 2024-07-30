@extends('layout.main')

@section('content')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite('resources/css/app.css')
    <title>Laravel</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />


    </head>

    <body>
        <div>
            <div class="bg-green-800 opacity-700">
                <div class="flex items-center justify-center py-4 pb-3">
                    <div class="font-bold pt-1 pb-3 text-white">
                        <h1 class="text-3xl">NO!</h1>
                        <p class="text-sm tracking-tight">THANKS</p>
                    </div>
                </div>
            </div>
            <div  class=" bg-green-700 min-h-screen">

                <div>
                    <div class="bg-green-700 mb-10 shadow-2xl ">
                        <div class="flex items-center justify-center py-4 pb-3">
                            <h1 class=" text-center text-lg font-bold text-white tracking-wider">Scan Product!</h1>
                            <div class="flex items-center absolute right-3 space-x-6">
                                <img src="/assets/icon/setting.svg" class="h-5 w-5" alt="">
                                <a href="/home">
                                    <img src="/assets/icon/home.svg" class="h-4 w-4" alt="">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="mt-20" id="reader"></div>
                    <input class="max-w-screen-sm max-h-screen" type="hidden" name="result" id="result">
                </div>
        </div>
        <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
            integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            let alertShown = false;

            function onScanSuccess(decodedText, decodedResult) {
                if (!alertShown) {
                    console.log("Barcode detected:", decodedText);
                    $('#result').val(decodedText);
                    let id = decodedText;
                    alertShown = true;
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: "{{ route('validasi') }}",
                        type: 'POST',
                        data: {
                            _method: "POST",
                            _token: CSRF_TOKEN,
                            barcode: id
                        },
                        success: function(response) {
                            console.log("Server response:", response);
                            if (response.status == 200) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Produk ini tidak di boikot',
                                    text: id,
                                    background: '#d4edda',
                                    color: '#155724'
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Produk ini di Boikot!!',
                                    text: id,
                                    background: '#f8d7da',
                                    color: '#721c24'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.log("AJAX error:", error);
                        }
                    });

                    setTimeout(() => {
                        alertShown = false;
                    }, 5000);
                }
            }

            $(document).ready(function() {
                const html5QrCode = new Html5Qrcode("reader");

                html5QrCode.start({
                            facingMode: "environment"
                        }, {
                            fps: 10,
                            qrbox: {
                                width: 250,
                                height: 250
                            }
                        },
                        onScanSuccess)
                    .catch(err => {
                        console.log("Unable to start scanning:", err);
                    });

                $(window).resize(function() {
                    html5QrCode.stop().then(() => {
                        html5QrCode.start({
                                    facingMode: "environment"
                                }, {
                                    fps: 10,
                                    qrbox: {
                                        width: 250,
                                        height: 250
                                    }
                                },
                                onScanSuccess)
                            .catch(err => {
                                console.log("Unable to start scanning:", err);
                            });
                    }).catch(err => {
                        console.log("Unable to stop scanning:", err);
                    });
                });
            });
        </script>
    </body>

    </html>
@endsection
