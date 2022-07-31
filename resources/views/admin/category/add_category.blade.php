@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-2">Create New Category</h4>
            <form action="/category" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control px-2" name="name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control px-2" name="slug">
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
                            <label for="" class="ml-2">Popular</label>
                            <input type="checkbox" name="popular">
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
