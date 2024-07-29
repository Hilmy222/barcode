import './bootstrap';
// resources/js/app.js

import Quagga from 'quagga';
import Swal from 'sweetalert2';
import $ from 'jquery';

$(document).ready(function() {
    function onDetected(result) {
        if (!alertShown) {
            console.log("Barcode detected:", result.codeResult.code);
            $('#result').val(result.codeResult.code);
            let id = result.codeResult.code;
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
                success: function (response) {
                    console.log("Server response:", response);
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
                    console.log("AJAX error:", error);
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
                    width: window.innerWidth,
                    height: window.innerHeight,
                    facingMode: "environment"
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

    initializeQuagga();

    $(window).resize(function() {
        Quagga.stop();
        initializeQuagga();
    });
});
