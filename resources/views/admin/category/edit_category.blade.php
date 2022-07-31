@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-2">Edit Category</h4>
            <form action="{{ url('category/'.$category->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Name</label>
                            <input type="text" class="form-control px-2" name="name" value="{{old('name',$category->name)}}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Slug</label>
                            <input type="text" class="form-control px-2" name="slug" value="{{old('slug',$category->slug)}}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Description</label>
                            <textarea name="description" rows="3" class="form-control px-2">{{old('description',$category->description)}}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="ml-2">Status</label>
                            <input type="checkbox" {{$category->status == '1' ? 'checked' : '' ;}} name="status">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="ml-2">Popular</label>
                            <input type="checkbox" {{$category->popular == '1' ? 'checked' : '' ;}} name="popular">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Title</label>
                            <input name="meta_title" type="text" class="form-control px-2" value="{{old('meta_title',$category->meta_title)}}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Keywords</label>
                            <input name="meta_keywords" type="text" class="form-control px-2" value="{{old('meta_keywords',$category->meta_keywords)}}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Meta Description</label>
                            <textarea name="meta_description" rows="3" class="form-control px-2" >{{old('meta_descrip',$category->meta_descrip)}}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Image</label><br>
                            <img src="{{asset('asset/upload/category/' . $category->image)}}" alt="" width="150px" height="150px" class="mb-2">
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
