@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-12">
            @if (session('status'))
                <div class="alert alert-warning alert-dismissible fade show mb-3" role="alert">
                    <strong>{{ session('status') }}</strong>
                    <button type="button" class="btn-close btn-primary text-dark" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
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
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                                        Name</th>
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
                                @foreach ($categories as $category)
                                    <tr>
                                        <td>
                                            <div class="px-3 py-1">
                                                <h6 class="mb-0 text-sm">{{ $category->id }}</h6>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="px-1 py-1">
                                                <h6 class="text-sm">{{ $category->name }}</h6>
                                            </div>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span>{{ strlen($category->description) > 50 ? substr($category->description, 0, 50) . '...' : $category->description }}</span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <img src="{{ asset('asset/upload/category/' . $category->image) }}"
                                                alt="Image Here" width="200px" height="150px">
                                            <span class="text-secondary text-xs font-weight-bold"></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <a href="category/{{ $category->id }}/edit"><button
                                                    class="btn btn-info btn-sm font-weight-bold text-xs">Edit</button></a>
                                            <form action="category/{{ $category->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <a href="category/{{ $category->id }}"
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
