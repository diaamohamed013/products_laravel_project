@extends('site.master')

@section('title')
    {{ 'Products' }}
@endsection

@section('content')
    <h1 class="text-center mt-4">
        Show Product
    </h1>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{{ $product->description }}</p>
                        <p class="card-text">
                            Price:
                            {{ $product->price }} $
                        </p>
                        <p class="card-text">
                            @isset($product->offer)
                                The new price is {{ $product->offer }} $ instead 0f <s>{{ $product->price }}</s> $
                            @endisset
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
