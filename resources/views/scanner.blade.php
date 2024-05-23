@extends('layout')

@section('content')
    <div class="container">
        <div id="wrapper">
            <h1>QRCode Scanner</h1>
            <div id="reader"></div>
            <div id="scannedData" style="font-size: 24px;"></div>
            <button class="btn btn-primary mt-3" onclick="goBack()">Back</button>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/html5-qrcode@latest/dist/html5-qrcode.min.js"></script>

    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/html5-qrcode.min.js') }}"></script>
    <script>
        const config = {
            fps: 30,
            qrbox: 200
        }

        const scanner = new Html5QrcodeScanner("reader", config)

        const displayScannedData = (data) => {
            const scannedDataElement = document.getElementById('scannedData');
            scannedDataElement.innerHTML = `<p>Car: ${data}</p>`;
        }

        const error = (err) => {
            alert(err)
        }

        scanner.render(displayScannedData, error);

        function goBack() {
            window.history.back();
        }
    </script>
@endsection
