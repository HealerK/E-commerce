@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-2">Create New Product</h4>
            <form action="/product" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Category</label>
                            <select name="category" id="" class="form-select">
                                <option value="#">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control px-2" name="name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control px-2" name="slug">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Small Description</label>
                            <textarea name="small_description" rows="3" class="form-control px-2"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control px-2"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="ml-2">Status</label>
                            <input type="checkbox" name="status">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="ml-2">Trending</label>
                            <input type="checkbox" name="trending">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Original Price</label>
                            <input type="number" class="form-control px-2" name="oprice">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Selling Price</label>
                            <input type="number" class="form-control px-2" name="sprice">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Quantity</label>
                            <input type="number" class="form-control px-2" name="qty">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Tax</label>
                            <input type="number" class="form-control px-2" name="tax">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Title</label>
                            <input name="meta_title" type="text" class="form-control px-2">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Keywords</label>
                            <input name="meta_keywords" type="text" class="form-control px-2">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" rows="3" class="form-control px-2"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Image</label>
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
