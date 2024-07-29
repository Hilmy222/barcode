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

<!-- Styles -->
<style>

#scanner-overlay {
        position: absolute;
        top: 40%;
        left: 50%;
        width: 80%; /* Adjust width as needed */
        height: 20%;
        border: 2px dashed red;
        transform: translate(-50%, -50%);
        pointer-events: none;
        z-index: 10;
    }
 

    canvas {
        display: none;
        width: 100%;
        height: 100%;
        display: block; /* Make canvas visible */
    }
    @media (max-width: 768px) {
        .fixed {
            width: 100%;
            height: auto;
        }
    }
</style>
</head>
<body>
    <div>
        <div>
            <div class="bg-green-700 opacity-700">
                <div class="flex items-center justify-center py-4 pb-3">
                    <h1 class=" text-center text-lg font-bold text-white tracking-wider">Scan</h1>
                    <div class="flex items-center absolute right-3 space-x-6">
                        <img src="/assets/icon/setting.svg" class="h-5 w-5" alt="">
                        <a href="/home">
                            <img src="/assets/icon/home.svg" class="h-4 w-4" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="fixed w-[428px] max-w-screen-md mx-auto">
            <div id="reader"></div>
            <div id="scanner-overlay"></div>
        </div>
        <input class="max-w-screen-sm max-h-screen" type="hidden" name="result" id="result">
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quagga/0.12.1/quagga.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        let alertShown = false; // Flag to indicate if alert has been shown

        function onDetected(result) {
            if (!alertShown) {
                console.log("Barcode detected:", result.codeResult.code); // Log detected barcode
                $('#result').val(result.codeResult.code);
                let id = result.codeResult.code;
                alertShown = true; // Set the flag to true
                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url: "{{ route('validasi') }}",
                    type: 'POST',
                    data: {
                        _method: "POST",
                        _token: CSRF_TOKEN,
                        barcode: id
                    },
                    success: function (response) {
                        console.log("Server response:", response); // Log server response
                        if(response.status == 200){
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
                        console.log("AJAX error:", error); // Log AJAX errors
                    }
                });

                setTimeout(() => {
                    alertShown = false;
                }, 5000); 
            }
        }

        function overrideQuaggaCanvas() {
            const originalGetContext = HTMLCanvasElement.prototype.getContext;
            HTMLCanvasElement.prototype.getContext = function (type, attributes) {
                if (type === '2d' && attributes === undefined) {
                    attributes = { willReadFrequently: true };
                }
                return originalGetContext.call(this, type, attributes);
            };
        }

        overrideQuaggaCanvas();

        function initializeQuagga() {
            Quagga.init({
                inputStream: {
                    name: "Live",
                    type: "LiveStream",
                    target: document.querySelector('#reader'),
                    constraints: {
                        width: 430,
                        height: 720,
                        facingMode: "environment" 
                    }, 
                    area: { // defines rectangle of the detection/localization area
    top: "0%",    // top offset
    right: "0%",  // right offset
    left: "0%",   // left offset
    bottom: "0%"  // bottom offset
  }, 
                    singleChannel: false
                },
                locator: {
                    patchSize: "medium",
                    halfSample: true
                },
                numOfWorkers: 4,
                decoder: {
                    readers: [
                        "code_128_reader",
                        "upc_reader",
                        "ean_reader",
                        "code_39_reader"
                    ]
                },
                locate: true
            }, function(err) {
                if (err) {
                    console.log("Quagga initialization error:", err); 
                    return;
                }
                console.log("Initialization finished. Ready to start");
                Quagga.start();
            });

            Quagga.onProcessed(function(result) {
                var drawingCtx = Quagga.canvas.ctx.overlay;
                var drawingCanvas = Quagga.canvas.dom.overlay;
                drawingCanvas.style.display = 'none'; 

                $('#result').append(drawingCanvas);
            });

            Quagga.onDetected(onDetected);
        }

        $(document).ready(function() {
            initializeQuagga();

            $(window).resize(function() {
    Quagga.stop();
    initializeQuagga();
});

        });
    </script>
</body>
</html>
@endsection
