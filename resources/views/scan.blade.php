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

#reader {
    height: 100vh; /* Full viewport height */
    width: calc(100vh * (9 / 16)); /* Width based on 9:16 aspect ratio */
    position: fixed;
    top: 0;
    left: 50%;
    transform: translateX(-50%); /* Center the reader */
}

#scanner-overlay {
    position: absolute;
    top: 50%;
    left: 50%;
    width: 60%;
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
        overflow: hidden;
    }
</style>
</head>
<body class="w-full h-full mx-auto">
    <div class="w-full h-full mx-auto fixed left-0 right-0 max-w-screen-sm ">
        <div id="reader">
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

        function adjustReaderSize() {
            const reader = document.getElementById('reader');
            const viewportHeight = window.innerHeight;
            const desiredWidth = viewportHeight * (9 / 16);
            reader.style.width = `${desiredWidth}px`;
             reader.style.height = `${viewportHeight}px`;
}

function initializeQuagga() {
    Quagga.init({
        inputStream: {
            name: "Live",
            type: "LiveStream",
            target: document.querySelector('#reader'),
            constraints: {
                width: window.innerWidth, // Set width to match the screen width
                height: window.innerHeight, // Set height to match the screen height
                facingMode: "environment"
            },
            area: {
                top: "0%",
                right: "0%",
                left: "0%",
                bottom: "0%"
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
        var drawingCanvas = Quagga.canvas.dom.overlay;
        drawingCanvas.style.display = 'none'; 
        $('#result').append(drawingCanvas);
    });

    Quagga.onDetected(onDetected);
}

$(document).ready(function() {
    adjustReaderSize();
    initializeQuagga();

    $(window).resize(function() {
        adjustReaderSize();
        Quagga.stop();
        initializeQuagga();
    });
});

    </script>
</body>
</html>
@endsection
