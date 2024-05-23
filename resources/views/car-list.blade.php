<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cars List PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            color: #333;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        hr {
            border: 0;
            height: 1px;
            background: #333;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th, td {
            border: 1px solid #333;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }

        td img {
            max-width: 50px;
            height: auto;
        }
    </style>
</head>
<body>
    <h1>Car List</h1>
    <hr>
    <table>
        <thead>
            <tr>
                <th>QR Code</th>
                <th>Make</th>
                <th>Model</th>
                <th>Rent Fee</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cars as $car)
                <tr>
                    <td><img src="data:image/png;base64,{{ base64_encode(QrCode::size(50)->generate($car->id)) }}" alt="QR Code"></td>
                    <td>{{ $car->make }}</td>
                    <td>{{ $car->model }}</td>
                    <td>&#x20B1; {{ number_format($car->rent_fee, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
