@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-2">Edit Product</h4>
            <form action="{{url('product/'.$product->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Category</label>
                            <select name="category" id="" class="form-select">
                                <option value="#">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control px-2" name="name"
                                value="{{ old('name', $product->name) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control px-2" name="slug" value="{{ old('slug', $product->slug) }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Small Description</label>
                            <textarea name="small_description" rows="3" class="form-control px-2">{{ old('small_description', $product->small_description) }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control px-2">{{ old('description', $product->description) }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="ml-2">Status</label>
                            <input type="checkbox" name="status" {{$product->status == '1' ? 'checked' : '' ;}}>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="ml-2">Trending</label>
                            <input type="checkbox" name="trending" {{$product->trending == '1' ? 'checked' : ''}}>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Original Price</label>
                            <input type="number" class="form-control px-2" name="oprice" value="{{ old('oprice', $product->original_price) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Selling Price</label>
                            <input type="number" class="form-control px-2" name="sprice" value="{{ old('sprice', $product->selling_price) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Quantity</label>
                            <input type="number" class="form-control px-2" name="qty" value="{{ old('qty', $product->qty) }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Tax</label>
                            <input type="number" class="form-control px-2" name="tax" value="{{ old('tax', $product->tax) }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Title</label>
                            <input name="meta_title" type="text" class="form-control px-2" value="{{ old('name', $product->name) }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Keywords</label>
                            <input name="meta_keywords" type="text" class="form-control px-2" value="{{ old('meta_keywords', $product->meta_keywords) }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" rows="3" class="form-control px-2">{{ old('meta_description', $product->meta_description) }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Image</label><br>
                            <img src="{{asset('asset/upload/product/' . $product->image)}}" alt="" width="200px" height="200px" class="mb-2">
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="col-md-12 mb-3">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
