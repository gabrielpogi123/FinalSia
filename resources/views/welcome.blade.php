@extends('layout')

@section('content')

<div class="d-flex justify-content-end">


    <a href="/products/pdf" target="_blank" class="btn btn-primary ">Export</a>
</div>
<div class="container mt-4">
    <div class="row">
        @foreach($products as $product)

            <div class="col-md-4 mb-4">

                <div class="card">
                    <div class="card-body text-center">

                        {!! QrCode::size(100)->generate(Request::url() . '/products/' . $product->id) !!}
                        <p class="card-text mt-2">Product ID: {{ $product->id }}</p>
                        <h5 class="card-title">{{ $product->name }}</h5>
                        <p class="card-text">${{ number_format($product->price, 2) }}</p>
                        <div class="mt-3">
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('products.delete', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
