@extends('layouts.admin')

@section('content')
    {{-- <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <div class="card-body">
          <form action="{{url('insert-category')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name">
                </div>

                <div class="col-md-6">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug">
                </div>
                
                <div class="col-md-12 mb-3">
                    <label for="">Description</label>
                    <textarea name="description" class="form-control" id="" rows="3"></textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status">
                </div>

                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" name="popular">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" name="meta_title"class="form-control">
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Keywords</label>
                  <textarea name="meta_keywords" id="" rows="3" class="form-control"></textarea>
                </div>

                <div class="col-md-12 mb-3">
                    <label for="">Meta Description</label>
                  <textarea name="meta_description" id="" rows="3" class="form-control"></textarea>
                </div>

                <div class="col-md-12">
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
          </form>
        </div>
    </div> --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    {{-- <div class="card-header">
                        Create Category
                        <a href="{{ route('add-category') }}" class="btn btn-primary float-right">Create category</a>
                    </div> --}}
                    <div class="card-body">
    
                        <form  action="{{url('insert-subcategory')}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label for="name">SubCategory Name:</label>
                                <input type="name" class="form-control" id="name" placeholder="Enter name" name="name">
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                                
                                <input type="file" class="form-control" placeholder="Add image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="">Choose Category</label>
                                <select name="category" class="form-control @error('category') is-invalid @enderror">
                                    <option value="">select</option>
                                    @foreach(App\Models\Category::all() as $key=> $category)
                                    <option value="{{$category->id}}">{{$category->category_name}}</option>
                                    @endforeach

                                </select>
                               
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
