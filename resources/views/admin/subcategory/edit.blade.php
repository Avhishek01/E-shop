@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">

                <div class="card-body">

                    <form method="POST" action="{{ url('subupdate/'.$category->id) }}">
                        @csrf
                        @method('PUT') 
                       
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group">
                            <label for="name">Category Name:</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}">
                            <span class="text-danger">{{ $errors->first('name') }}</span>
                            <img src="{{ url('image/subcategory/'.$category->image) }}"
                            style="height: 100px; width: 100px;"><br><br>
                            
                            <input type="file" class="form-control" placeholder="Add image" name="image">
                        </div>
                        <button type="submit"  class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection