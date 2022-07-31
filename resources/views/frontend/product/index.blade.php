@extends('layouts.frontend')

@section('title')
    {{ $category->name }}
@endsection

@section('content')
    <div class="py-4 bg-warning shadow-sm mb-4 border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('front_category') }}">
                    Collecitons
                </a> /
                <a href="{{ url('categoryFront/' . $category->slug) }}">
                    {{ $category->name }}
                </a>
            </h6>
        </div>
    </div>
    <div class="container">
        <div class="py-5">
            <div class="row">
                <h2>{{ $category->name }}</h2>
                @foreach ($products as $product)
                    <div class="col-md-3 mb-3">
                        <div class="card">
                            <a href="{{ url('categoryFront/' . $category->slug . '/' . $product->slug) }}">
                                <div class="card-body">
                                    <img src="{{ asset('asset/upload/product/' . $product->image) }}" alt="Image"
                                        width="200px;" height="200px">
                                    <h5 class="mb-3 mt-2">{{ $product->name }}</h5>
                                    <p>{{ strlen($product->description) > 50 ? substr($product->description, 0, 50) . '...' : $product->description }}
                                    </p>
                                </div>
                            </a>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
