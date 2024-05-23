<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loks Car Rental</title>
    <link rel="stylesheet" href="{{ asset('bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('style.css') }}">

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
        }

        #sidebar {
            width: 250px;
            background-color: #0066CC;
            color: #fff;
            height: 100vh;
            padding: 20px;
            position: fixed;
            display: flex;
            flex-direction: column;
        }

        #title h1 {
            margin: 0;
            font-size: 1.8rem;
            text-align: center;
            margin-bottom: 20px;
        }

        #main-nav {
            display: flex;
            flex-direction: column;
            margin-bottom: auto;
        }

        #main-nav a {
            color: #fff;
            text-decoration: none;
            margin: 10px 0;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        #main-nav a:hover {
            background-color: #3399FF;
        }

        .active {
            background-color: #3399FF;
        }

        #main {
            margin-left: 270px;
            padding: 20px;
            width: calc(100% - 270px);
            max-width: calc(100% - 270px);
        }

        #content {
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <div id="sidebar">
        <div id="title">
            <h1>Loks Car Rental</h1>
        </div>
        <nav id="main-nav">
            <a href="{{ url('/home') }}" class="{{ Request::is('/') ? 'active' : '' }}">Home</a>
            <a href="{{ url('/cars') }}" class="{{ Request::is('cars') ? 'active' : '' }}">Cars</a>
            <a href="{{ url('/about') }}" class="{{ Request::is('about') ? 'active' : '' }}">About</a>
        </nav>
    </div>

    <div id="main">
        <div id="content">
            @yield('content')
        </div>
    </div>

</body>
</html>
