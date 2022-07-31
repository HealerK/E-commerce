@extends('layouts.frontend')

@section('title', 'Welcome to E-shop')

@section('content')

    @include('layouts.inc.slider')
    <div class="container mt-3">
        <div class="row">
            <h2 class="my-4">Featured Products</h2>
            <div class="owl-carousel products-carousel owl-theme">
                @foreach ($products as $product)
                    <div class="item">
                        <a href="{{ url('categoryFront/'.$product->category->slug .'/' . $product->slug)}}">
                            <div class="card">
                                <div class="card-body">
                                    <img src="{{ asset('asset/upload/product/' . $product->image) }}" alt="Image"
                                        width="200px;" height="250px">
                                    <h5 class="mb-3 mt-2">{{ $product->name }}</h5>
                                    <p>{{ strlen($product->description) > 50 ? substr($product->description, 0, 50) . '...' : $product->description }}
                                    </p>
                                    <span style="float: left;">${{ $product->selling_price }}</span>
                                    <span style="float: right;">$<s>{{ $product->original_price }}</s></span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="py-5">
            <div class="row">
                <h2>Trending Categories</h2>
                <div class="owl-carousel products-carousel owl-theme">
                    @foreach ($categories as $category)
                        <div class="item">
                            <a href="{{ url('view-category/' . $category->slug) }}">
                                <div class="card">
                                    <div class="card-body">
                                        <img src="{{ asset('asset/upload/category/' . $category->image) }}" alt="Image"
                                            width="200px;" height="250px">
                                        <h5 class="mb-3 mt-2">{{ $category->name }}</h5>
                                        <p>{{ strlen($category->description) > 50 ? substr($category->description, 0, 50) . '...' : $category->description }}
                                        </p>

                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $(".products-carousel").owlCarousel({
                loop: true,
                margin: 10,
                nav: true,
                dots: false,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 4
                    }
                }
            });
        });
    </script>
@endsection
