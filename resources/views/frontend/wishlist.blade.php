@extends('layouts.frontend')

@section('title')
    My Wishlist
@endsection

@section('content')
    <div class="py-4 bg-warning shadow-sm mb-4 border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('wishlist') }}">
                    Wishlist
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-4">
        <div class="card shadow">
            @if ($wishlists->count() > 0)
                <div class="card-body">
                    @foreach ($wishlists as $item)
                        <div class="row product_data mb-3">
                            <div class="col-md-2">
                                <img src="{{ asset('asset/upload/product/' . $item->products->image) }}" alt="Image Here"
                                    height="70px" width="70px">
                            </div>
                            <div class="col-md-3">
                                <h5>{{ $item->products->name }}</h5>
                            </div>
                            <div class="col-md-2">
                                <h5>{{ $item->products->selling_price }}</h5>
                            </div>
                            <div class="col-md-3">
                                @if ($item->products->qty >= $item->prod_qty)
                                    <label for="">Quantity</label>
                                    <div class="input-group text-center mb-3">
                                        <button class="input-group-text decreaseBtn changeQty">-</button>
                                        <input type="text" class="form-control text-center qty_input" value="1"
                                            name="quantity">
                                        <button class="input-group-text increaseBtn changeQty">+</button>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-2 align-middle text-center">
                                <input type="hidden" name="" class="prod_id inline-block"
                                    value="{{ $item->products->id }}">
                                <button type="submit" class="btn btn-primary addToCart me-3 mb-2 ">Add To
                                    Cart <i class="fa-solid fa-cart-shopping"></i></button>
                                <form action="{{ url('wish-delete/' . $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i> Remove</button>
                                </form>
                            </div>

                        </div>
                        <hr>
                    @endforeach
                </div>
            @else
                <div class="card-body">
                    <h2 class="text-center">Wishlist <i class="fa fa-shopping-cart"></i> is empty!</h2>
                    <a href="{{ url('front_category') }}" class="btn btn-outline-info float-end">Continue Shopping</a>
                </div>
            @endif
        </div>
    </div>
@endsection
