@extends('layouts.frontend')

@section('title', 'Category')

@section('content')
    <div class="container mt-3">
        <div class="row">
            <h2 class="my-4">All Categories</h2>
            @foreach ($categories as $category)
                <div class="col-md-3 mb-3">
                    <a href="{{ url('view-category/' . $category->slug) }}">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{ asset('asset/upload/category/' . $category->image) }}" alt=""
                                    width="100%" height="250px">
                                <h4 class="my-4">{{ $category->name }}</h4>
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

