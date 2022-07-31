@extends('layouts.frontend')

@section('title')
    My Checkout
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table">
                            <tr>
                                <th>Name</th>
                                <th>Qty</th>
                                <th>Price</th>
                            </tr>
                            @php $total = 0; @endphp
                            @foreach ($cartItems as $item)
                                <tr>
                                    <td>{{ $item->products->name }}</td>
                                    <td>{{ $item->prod_qty }}</td>
                                    <td>{{ $item->products->selling_price }}</td>
                                </tr>
                                @php $total += $item->products->selling_price * $item->prod_qty  ; @endphp
                            @endforeach
                            <tr>
                                <td colspan="2" class="h3">Grand Price :</td>
                                <td class="h4">{{ $total }}</td>
                            </tr>
                        </table>
                        <form action="{{ url('orderstore') }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-outline-primary float-end">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
