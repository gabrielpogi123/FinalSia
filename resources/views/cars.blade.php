@extends('layout')

@section('content')

<div class="d-flex justify-content-start gap-0">
    <a href="{{ route('scanner') }}" class="btn btn-outline-secondary btn-sm d-flex align-items-center gap-2">
        <svg id="Layer_1" data-name="Layer 1" class="icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 122.61 122.88" style="width: 20px; height: 20px;">
            <title>scan</title>
            <path d="M23.38,0h13V11.15h-13a12.22,12.22,0,0,0-8.64,3.57l0,0a12.22,12.22,0,0,0-3.57,8.64V39.32H0V23.38A23.32,23.32,0,0,1,6.86,6.89l0,0A23.31,23.31,0,0,1,23.38,0ZM3.25,54.91H119.36a3.29,3.29,0,0,1,3.25,3.27V64.7A3.29,3.29,0,0,1,119.36,68H3.25A3.28,3.28,0,0,1,0,64.7V58.18a3.27,3.27,0,0,1,3.25-3.27ZM90.57,0h8.66a23.28,23.28,0,0,1,16.49,6.86v0a23.32,23.32,0,0,1,6.87,16.52V39.32H111.46V23.38a12.2,12.2,0,0,0-3.6-8.63v0a12.21,12.21,0,0,0-8.64-3.58H90.57V0Zm32,81.85V99.5a23.46,23.46,0,0,1-23.38,23.38H90.57V111.73h8.66A12.29,12.29,0,0,0,111.46,99.5V81.85Zzm-86.23,41h-13A23.32,23.32,0,0,1,6.86,116l-.32-.35A23.28,23.28,0,0,1,0,99.5V81.85H11.15V99.5a12.25,12.25,0,0,0,3.35,8.41l.25.22a12.2,12.2,0,0,0,8.63,3.6h13v11.15Z"/>
        </svg>
        Scan Here
    </a>
</div>
<div class="d-flex justify-content-end gap-2 p-4">
    <form action="{{ route('car.import') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="csv_file">
        <button type="submit" class="btn btn-primary">Import CSV</button>
    </form>
    <a href="/cars/csv-all" target="_blank" class="btn btn-primary rounded-2">Generate CSV</a>
    <a href="/cars/pdf" target="_blank" class="btn btn-primary rounded-2">Export PDF</a>
</div>

<div class="container mt-4">
    <div class="row">
        @foreach($cars as $car)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm" style="background-color: #4689cc;">
                <div class="card-body text-center">
                    <img src="" alt="" class="img-fluid mb-3" style="max-width: 100px;">
                    {!! QrCode::size(100)->generate( $car->make .' '. $car->model .' PHP '. number_format($car->rent_fee, 2)) !!}
                    <h5 class="card-title mt-3">{{ $car->make }}</h5>
                    <p class="card-text">{{ $car->model }}</p>
                    <p class="card-text">Rent Fee (PHP): &#x20B1; {{ number_format($car->rent_fee, 2) }}</p>
                    <form action="{{ route('car.delete', $car->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0V0z"/><path d="M8 9h8v10H8z" opacity=".3"/><path d="M18 5h-3.5l-1-1h-5l-1 1H6v2h12V5zm-2 14h-4V9h4v10z"/></svg>
                        </button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

@endsection
