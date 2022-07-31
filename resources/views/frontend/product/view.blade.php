@extends('layouts.frontend')

@section('title')
    {{ $products->name }}
@endsection

@section('content')
    <div class="py-4 bg-warning shadow-sm mb-4 border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('front_category') }}">
                    Collecitons
                </a> /
                <a href="{{ url('view-category/' . $products->category->slug) }}">
                    {{ $products->category->name }}
                </a>/
                <a href="{{ url('categoryFront/' . $products->category->slug . '/' . $products->slug) }}">
                    {{ $products->name }}
                </a>
            </h6>
        </div>
    </div>
    <div class="container">
        @if (session('status'))
            <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close btn-primary text-dark" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <img src="{{ asset('asset/upload/product/' . $products->image) }}" alt="" class="w-100">
                    </div>
                    <div class="col-md-8">
                        <h2>
                            {{ $products->name }}
                            @if ($products->trending == '1')
                                <label for="" style="font-size:16px;"
                                    class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <label for="" class="me-3">Original Price :
                            $<s>{{ $products->original_price }}</s></label>
                        <label for="" class="fw-bold">Selling Price : ${{ $products->selling_price }}</label>
                        <p class="mt-3" style="font-family: 'Roboto', sans-serif;">
                            {{ $products->small_description }}
                        </p>
                        <hr>

                        @if ($products->qty > 0)
                            <label class="badge bg-success mb-3">In Stock</label>
                        @else
                            <label class="badge bg-danger mb-3">Out Of Stock</label>
                        @endif

                        <div class="row">
                            <form action="{{ route('cart.store') }}" method="post">
                                @csrf
                                <div class="col-md-3">
                                    <input type="hidden" value="{{ $products->id }}" name="product_id" class="prod_id">
                                    <label for="">Quantity</label>
                                    <div class="input-group text-center mb-3">
                                        <button class="input-group-text decreaseBtn">-</button>
                                        <input type="text" class="form-control text-center qty_input" value="1"
                                            name="quantity">
                                        <button class="input-group-text increaseBtn">+</button>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <br>
                                    @if ($products->qty > 0)
                                        <button type="submit" class="btn btn-primary addToCart me-3 float-start">Add To
                                            Cart <i class="fa-solid fa-cart-shopping"></i></button>
                                    @endif
                                    <button type="button" class="btn btn-success me-3 float-start wishlist">Add To Wishlist <i
                                            class="fa-solid fa-heart"></i></button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <hr>
                <h2 class="mb-2">Description</h2>
                <p>
                    {{ $products->description }}
                </p>
            </div>
        </div>
    </div>
@endsection
