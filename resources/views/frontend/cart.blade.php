@extends('layouts.frontend')

@section('title')
    My Cart
@endsection

@section('content')
    <div class="py-4 bg-warning shadow-sm mb-4 border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{ url('/') }}">
                    Home
                </a> /
                <a href="{{ url('cart') }}">
                    Cart
                </a>
            </h6>
        </div>
    </div>

    <div class="container my-4">
        <div class="card shadow">
            @if ($cartItems->count() > 0)
                <div class="card-body">
                    @php $total = 0; @endphp
                    @foreach ($cartItems as $item)
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
                                <input type="hidden" class="product_id" value="{{ $item->products->id }}">
                                @if ($item->products->qty >= $item->prod_qty)
                                    <label for="">Quantity</label>
                                    <div class="input-group text-center mb-3">
                                        <button class="input-group-text decreaseBtn changeQty">-</button>
                                        <input type="text" class="form-control text-center qty_input"
                                            value="{{ $item->prod_qty }}" name="quantity">
                                        <button class="input-group-text increaseBtn changeQty">+</button>
                                    </div>
                                    @php $total += $item->products->selling_price * $item->prod_qty  ; @endphp
                                @endif
                            </div>

                            <div class="col-md-2">
                                <form action="{{ url('cart-delete/' . $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                </form>
                            </div>

                        </div>
                        <hr>
                    @endforeach
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 ">
                                <h4 class="mb-2">Total Price : {{ $total }}</h4>
                            </div>

                            <div class="col-md-6">
                                <a href="{{ url('checkout-process') }}" class="btn btn-outline-success btn-lg float-end">Checkout
                                    Process</a>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="card-body">
                    <h2 class="text-center">Cart <i class="fa fa-shopping-cart"></i> is empty!</h2>
                    <a href="{{ url('front_category') }}" class="btn btn-outline-info float-end">Continue Shopping</a>
                </div>
            @endif
        </div>
    </div>
@endsection
