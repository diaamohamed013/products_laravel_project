@extends('site.master')

@section('title')
    {{ 'Products' }}
@endsection

@section('content')
    <h1 class="text-center mt-4">
        All Products
    </h1>
    <div class="container">
        <div class="text-center my-4">
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                Add
            </a>
        </div>
        @include('site.inc.success')
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4 mb-4">
                    <div class="card mt-4 h-100">
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
                            <div class="d-flex justify-content-center align-items-center mb-4" style="gap: 10px;">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-info">
                                    Show
                                </a>
                                <form method="POST" action="{{route('products.destroy',$product->id)}}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                            <div class="text-center">
                                <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">
                                    Edit
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
