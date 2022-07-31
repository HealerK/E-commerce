@extends('layouts.admin')

@section('content')
    <div class="row">
        @if (session('status'))
            <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="btn-close btn-primary text-dark" data-bs-dismiss="alert"
                    aria-label="Close"></button>
            </div>
        @endif
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Category table</h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Category
                                    </th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Selling Price</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Description</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Image</th>
                                    <th
                                        class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr>
                                        <td>
                                            <div class="px-3 py-1">
                                                <h6 class="mb-0 text-sm">{{ $product->id }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-3 py-1">
                                                <h6 class="mb-0 text-sm">{{ $product->category->name }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-1 py-1">
                                                <h6 class="text-sm">{{ $product->name }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-1 py-1">
                                                <h6 class="text-sm">{{ $product->selling_price }}</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span>{{ strlen($product->description) > 50 ? substr($product->description, 0, 50) . '...' : $product->description }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img src="{{ asset('asset/upload/product/' . $product->image) }}"
                                                alt="Image Here" width="200px" height="150px">
                                            <span class="text-secondary text-xs font-weight-bold"></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="product/{{ $product->id }}/edit"><button
                                                    class="btn btn-info btn-sm font-weight-bold text-xs">Edit</button></a>
                                            <form action="product/{{ $product->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="product/{{ $product->id }}"
                                                    onclick="return confirm('Are you sure you want to delete this category?');"><button
                                                        class="btn btn-danger btn-sm font-weight-bold text-xs">Delete</button></a>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
